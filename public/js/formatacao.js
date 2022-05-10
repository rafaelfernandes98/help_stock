function numToMoedaFormatado(num, precision = false) {
    num = Number(num);

    if (!precision) {
        num = parseFloat(num.toFixed(2));
        return num.toLocaleString('pt-br', { minimumFractionDigits: 2 });

    } else {
        num = parseFloat(num.toFixed(precision));
        return num.toLocaleString('pt-br', { minimumFractionDigits: precision });
    }
}

function moedaToNum(valor) {
    valor = valor.replace(/\./g, "");
    valor = valor.replace(/\,/g, ".");
    valor = Number(valor);
    return valor;
}