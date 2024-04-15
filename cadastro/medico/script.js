let rua=document.getElementById('rua');
let bairro=document.getElementById('bairro');
let cidade=document.getElementById('cidade');
let estado=document.getElementById('estado');
let dddc=document.getElementById('celular');

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
    dddc.value=data.ddd;        
    })
}