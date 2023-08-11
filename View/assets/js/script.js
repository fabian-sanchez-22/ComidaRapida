
//element.precio 
function readProductos() {
    axios.get("../controller/readProductos.php")
    .then(function(response) {
        let SelProductos = "";
        response.data.forEach(element => {
            SelProductos += `
                <div class="row mt-5">
                    Producto: ${element.nombre}
                    <input type="number" min="1" id="producto-${element.id}"><button onclick="calcularPrecio(${element.id}, ${element.precio})">Hacer pedido</button><p id="total-producto-${element.id}"></p>
                </div>`;
        });
        document.getElementById("Selproductos").innerHTML = SelProductos;
    })
    .catch(function(error) {
        console.log(error);
    });
}

function readToppins() {
    axios.get("../controller/readToppins.php")
    .then(function(response) {
        let Toppins = "";
        response.data.forEach(element => {
            Toppins += `
                <div class="row mt-5">
                    Toppin: ${element.nombreT}<input type="number" min="5" max="8" id="toppin-${element.id}"><button onclick="agregarToppins(${element.id}, ${element.precioT}); totalFinal();">Agregar toppins</button><p id="total-toppin-${element.id}"></p>
                </div>`;
        });
        document.getElementById("Toppins").innerHTML = Toppins;
    })
    .catch(function(error) {
        console.log(error);
    });
}


let totalFinal = 0;
let productos = {};

function calcularPrecio(id, precioBase) {
    const cantidadTexto = document.getElementById(`producto-${id}`).value;
    const cantidadNumero = parseFloat(cantidadTexto);
    const total = cantidadNumero * precioBase;
    totalFinal += total;
    mostrarTotal(`total-producto-${id}`, total);
}

function agregarToppins(id, precioTop) {
    const cantidadTexto = document.getElementById(`toppin-${id}`).value;
    const cantidadNumero = parseFloat(cantidadTexto);
    const totalTop = cantidadNumero * precioTop;
    totalFinal += totalTop;
    mostrarTotal(`total-toppin-${id}`, totalTop);
}

function mostrarTotal(elementId, total) {
    const totalElement = document.getElementById(elementId);
    totalElement.textContent = `Total: $${total}`;
    mostrarTotalFinal();
}

function mostrarTotalFinal() {
    const totalFinalElement = document.getElementById("totalFinal");
    totalFinalElement.innerHTML = `El total a pagar por su compra es de: $${totalFinal}`;
}

