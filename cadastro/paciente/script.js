let rua=document.getElementById('rua');
let bairro=document.getElementById('bairro');
let cidade=document.getElementById('cidade');
let estado=document.getElementById('estado');
let ddd=document.getElementById('telefone');

function carregaCep(){
    let txtCep = document.getElementById('cep').value;

    const url = `https://viacep.com.br/ws/${txtCep}/json/`;

    fetch(url)
    .then(response => response.json())
    .then(data => {                
    rua.value=data.logradouro;
    bairro.value=data.bairro;
    cidade.value=data.localidade;
    estado.value=data.uf.toLowerCase();
    ddd.value=data.ddd;     
    })
}

function addTelefone() {
    var divTelefones = document.getElementById("telefones");
    var input = document.createElement("input");
    input.type = "tel";
    input.name = "telefones[]";
    input.placeholder = "(XX)XXXXX-XXXX";
    divTelefones.appendChild(input);
}