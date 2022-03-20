"use strict"

let menu = document.querySelector(".menu-burguer")
let conteudo = document.querySelector(".conteudoMenuBurguer")

const mostrarBarra = () => {
    conteudo.classList.toggle("active")
}

menu.addEventListener("click", mostrarBarra)