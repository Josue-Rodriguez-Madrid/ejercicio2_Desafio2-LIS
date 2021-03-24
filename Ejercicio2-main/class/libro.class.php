<?php
//Definición de la clase empleado
class libro {
    //Estableciendo las propiedades de la clase
    private static $idlibro = 0;

    private $autor;
    private $Tlibro;
    private $Nedicion;
    private $Lpublicacion;
    private $editorial;
    private $Aedicion;
    private $Npaginas;
    private $Notas;
    private $ISBN;
   
    function __construct(){

        self::$idlibro++;
        $this->autor = "";
        $this->Tlibro = "";
        $this->Nedicion = 0;
        $this->Lpublicacion = "";
        $this->editorial = "";
        $this->Aedicion = "";
        $this->Npaginas = 0;
        $this->ISBN = 0;
    }
    //Destructor de la clase
    function __destruct(){
        echo "<p class=\"msg\">El libro ha sido ingresado.</p>";
        $backlink = "<a class=\"a-btn\" href=\"index.php\">";
        $backlink .= "<span class=\"a-btn-text\">Ingresar otro libro</span>";
        $backlink .= "<span class=\"a-btn-slide-text\"> a la base</span>";
        $backlink .= "<span class=\"a-btn-slide-icon\"></span>";
        $backlink .= "</a>";
        echo $backlink;
    }
    //Métodos de la clase empleado
    function obtenerlibro($autor, $Tlibro, $Nedicion, $Lpublicacion, $editorial, $Aedicion, $Npaginas, $Notas, $ISBN){
        $this->autor = $autor;
        $this->Tlibro = $Tlibro;
        $this->Nedicion = $Nedicion;
        $this->Lpublicacion = $Lpublicacion;
        $this->editorial = $editorial;
        $this->Aedicion = $Aedicion;
        $this->Npaginas = $Npaginas;
        $this->Notas = $Notas;
        $this->ISBN = $ISBN;

/*
        if($this->pagoxhoraextra > 0) {
            $this->isss = ($salario + $this->pagoxhoraextra) *
            self::descISSS;
            $this->afp = ($salario + $this->pagoxhoraextra) *
            self::descAFP;
        }
        else {
            $this->isss = $salario * self::descISSS;
            $this->afp = $salario * self::descAFP;
        }
        $salariocondescuento = $this->sueldoNominal - ($this->isss + $this->afp);
        //De acuerdo a criterios del Ministerio de Hacienda
        //el descuento de la renta varía según el ingreso percibido
        if($salariocondescuento>2038.10){
            $this->renta = $salariocondescuento * 0.3;
        }
        elseif($salariocondescuento>895.24 && $salariocondescuento<=2038.10){
            $this->renta = $salariocondescuento * 0.2;
        }
        elseif($salariocondescuento>472.00 && $salariocondescuento<=895.24){
            $this->renta = $salariocondescuento * 0.1;
        }
        elseif($salariocondescuento>0 && $salariocondescuento<=472.00){
            $this->renta = 0.0;
        }
        /* else {
            //Significa que el salario obtenido es negativo
        } 
        $this->sueldoNominal = $salario;
        $this->sueldoLiquido = $this->sueldoNominal +
        $this->pagoxhoraextra - ($this->isss + $this->afp + $this->renta);*/

        $this->imprimirLibro();
    }
    function imprimirlibro(){
        $tabla = "<table class='table '><tr>";
        $tabla .= "<td>Id Libro: </td>";
        $tabla .= "<td>" . self::$idlibro . "</td></tr>";
        $tabla .= "<tr><td>Autor(res) del libro: </td>\n";
        $tabla .= "<td>" . $this->autor."</td></tr>";
        $tabla .= "<tr><td>Titulo del libro: </td>";
        $tabla .= "<td> " . $this->Tlibro. "</td></tr>";
        $tabla .= "<tr><td>Numero de edicion: </td>";
        $tabla .= "<td> " . $this->Nedicion. "</td></tr>";
        //$tabla .= "<tr class='success'><td colspan=\"2\"><h4>Descuentos</h4></td></tr>";
        $tabla .= "<tr ><td >Lugar de la publicacion: </td>";
        $tabla .= "<td> " .$this->Lpublicacion. "</td></tr>";
        $tabla .= "<tr><td>Editorial: </td>";
        $tabla .= "<td> " .$this->editorial. "</td></tr>";
        $tabla .= "<tr><td>Año de edicion: </td>";
        $tabla .= "<td> " .$this->Aedicion. "</td></tr>";
        $tabla .= "<tr><td>Numero de paginas: </td>";
        $tabla .= "<td> " .$this->Npaginas. "</td></tr>";
        $tabla .= "<tr><td>Notas: </td>";
        $tabla .= "<td> " .$this->Notas. "</td></tr>";
        $tabla .= "<tr><td>ISBN: </td>";
        $tabla .= "<td> " .$this->ISBN. "</td></tr>";

        echo $tabla;
    }
}
?>
