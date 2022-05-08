<?php

namespace Mini\Controller;


class FrontController{

    private $styles =[];
    private $script = [];

    public function getScripts()
    {
        return $this->script;
    }

    public function addScript($scriptPath)
    {
        if (!in_array($scriptPath, $this->getScripts())) {
            $this->script[] = $scriptPath;
        }
    }

    public function renderScript()
    {
        $return = [];

        foreach ($this->getScripts() as $script) {
            array_push($return, "<script src=\"{$script}\"></script>");
        }

        return implode("\n", $return);
    }

    public function getStyles()
    {
        return $this->styles;
    }

    public function addStyle($stylePath)
    {
        if (!in_array($stylePath, $this->getStyles())) {
            $this->styles[] = $stylePath;
        }
    }

    public function renderStyle()
    {
        $return = [];

        foreach ($this->getStyles() as $style) {
            array_push($return, "<link rel=\"stylesheet\" href=\"{$style}\">");
        }

        return implode("\n", $return);
    }
}


?>