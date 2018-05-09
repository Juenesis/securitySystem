<div class="calculadora"
<form action="#" name="calculadora" id="calculadora">
  <p id="textoPantalla">0</p>
  <p>
    <input type="button" class="largo" value="Retr" onclick="retro()"   />
    <input type="button" class="largo" value="CE" onclick="borradoParcial()"  />
    <input type="button" class="largo" value="C" onclick="borradoTotal()"  />
  </p>
  <p>
    <input type="button" value="7" onclick="numero(7)" />
    <input type="button" value="8" onclick="numero('8')" />
    <input type="button" value="9" onclick="numero('9')" />
    <input type="button" value="/" onclick="operar('/')"  />
    <input type="button" value="Raiz" onclick="raizc()" />
  </p>
  <p>
    <input type="button" value="4" onclick="numero('4')" />
    <input type="button" value="5" onclick="numero('5')" />
    <input type="button" value="6" onclick="numero('6')" />
    <input type="button" value="*" onclick="operar('*')" />
    <input type="button" value="%" onclick="porcent()" />
  </p>
  <p>
    <input type="button" value="1" onclick="numero('1')" />
    <input type="button" value="2" onclick="numero('2')" />
    <input type="button" value="3" onclick="numero('3')" />
    <input type="button" value="-" onclick="operar('-')" />
    <input type="button" value="1/x" onclick="inve()" />
  </p>
  <p>
    <input type="button" value="0" onclick="numero('0')" />
    <input type="button" value="+/-" onclick="opuest()" />
    <input type="button" value="." onclick="numero('.')" />
    <input type="button" value="+" onclick="operar('+')" />
    <input type="button" value="=" onclick="igualar()" />
  </p>
</form>
</div>

<script type="text/javascript">
	window.onload = function(){ //Acciones tras cargar la página
pantalla=document.getElementById("textoPantalla"); //elemento pantalla de salida
}
x="0"; //guardar número en pantalla
xi=1; //iniciar número en pantalla: 1=si; 0=no;
coma=0; //estado coma decimal 0=no, 1=si;
ni=0; //número oculto o en espera.
op="no"; //operación en curso; "no" =  sin operación.

function operar(s) {
         ni=x //ponemos el 1º número en "numero en espera" para poder escribir el segundo.
         op=s; //guardamos tipo de operación.
         xi=1; //inicializar pantalla.
       }
       function igualar() {
         if (op=="no") { //no hay ninguna operación pendiente.
            pantalla.innerHTML=x;	//mostramos el mismo número	
          }
         else { //con operación pendiente resolvemos
            sl=ni+op+x; // escribimos la operación en una cadena
            sol=eval(sl) //convertimos la cadena a código y resolvemos
            pantalla.innerHTML=sol //mostramos la solución
            x=sol; //guardamos la solución
            op="no"; //ya no hay operaciones pendientes
            xi=1; //se puede reiniciar la pantalla.
          }
        }

        function raizc() {
         x=Math.sqrt(x) //resolver raíz cuadrada.
         pantalla.innerHTML=x; //mostrar en pantalla resultado
         op="no"; //quitar operaciones pendientes.
         xi=1; //se puede reiniciar la pantalla 
       }
       function porcent() { 
         x=x/100 //dividir por 100 el número
         pantalla.innerHTML=x; //mostrar en pantalla
         igualar() //resolver y mostrar operaciones pendientes
         xi=1 //reiniciar la pantalla
       }
       function opuest() { 
            nx=Number(x); //convertir en número
            nx=-nx; //cambiar de signo
            x=String(nx); //volver a convertir a cadena
            pantalla.innerHTML=x; //mostrar en pantalla.
          }

          function inve() {
           nx=Number(x);
           nx=(1/nx);
           x=String(nx);		 
           pantalla.innerHTML=x;
         xi=1; //reiniciar pantalla al pulsar otro número.
       }
    function retro(){ //Borrar sólo el último número escrito.
         cifras=x.length; //hayar número de caracteres en pantalla
         br=x.substr(cifras-1,cifras) //info del último caracter
         x=x.substr(0,cifras-1) //quitar el ultimo caracter
         if (x=="") {x="0";} //si ya no quedan caracteres, pondremos el 0
         if (br==".") {coma=0;} //Si hemos quitado la coma, se permite escribirla de nuevo.
         pantalla.innerHTML=x; //mostrar resultado en pantalla	 
       }
       function borradoParcial() {
        pantalla.innerHTML=0; //Borrado de pantalla;
        x=0; //Borrado indicador número pantalla.
        coma=0; //reiniciamos también la coma					
      }

      function borradoTotal() {
         pantalla.innerHTML=0; //poner pantalla a 0
         x="0"; //reiniciar número en pantalla
         coma=0; //reiniciar estado coma decimal 
         ni=0 //indicador de número oculto a 0;
         op="no" //borrar operación en curso.
       }

       function operar(s) {
         igualar(); //si hay operaciones pendientes se realizan primero
         ni=x; //ponemos el 1º número en "numero en espera" para poder escribir el segundo.
         op=s; //guardamos tipo de operación.
         xi=1; //inicializar pantalla.
       }


function numero(xx) { //recoge el número pulsado en el argumento.
         if (x=="0" || xi==1  ) { // inicializar un número, 
            pantalla.innerHTML=xx; //mostrar en pantalla
            x=xx; //guardar número
            if (xx==".") { //si escribimos una coma al principio del número
               pantalla.innerHTML="0."; //escribimos 0.
               x=xx; //guardar número
               coma=1; //cambiar estado de la coma
             }
           }
           else { //continuar escribiendo un número
               if (xx=="." && coma==0) { //si escribimos una coma decimal pòr primera vez
                 pantalla.innerHTML+=xx;
                 x+=xx;
                   coma=1; //cambiar el estado de la coma  
                 }
              //si intentamos escribir una segunda coma decimal no realiza ninguna acción.
              else if (xx=="." && coma==1) {} 
               //Resto de casos: escribir un número del 0 al 9: 	 
             else {
               pantalla.innerHTML+=xx;
               x+=xx
             }
           }
            xi=0 //el número está iniciado y podemos ampliarlo.
          }

        </script>

        <style>
        
        /*aspectos generales: bordes y color de fondo de calculadora*/
        .calculadora { border: 3px blue ridge; width: 250px;text-align: center;background-color: #f6f8d8; }

        /*pantalla de visualización: bordes, posición, color de fondo, estilo letra.*/
        #textoPantalla { width: 185px; border: 2px black solid; text-align: right; 
         position: relative; left: 23px;  padding: 0px 5px;
         background-color: white; font-family: "courier new"; 
         overflow: hidden;}

         /*botones normales: anchura y margen*/
         .calculadora [type=button] { width: 35px; padding: 0;  }
         /*botones especiales*/
         .calculadora input.largo { color: red; width: 60px; 
         </style>