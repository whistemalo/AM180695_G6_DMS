<?php

class Producto {

    public $DB;

    public function __construct() {
        $this->DB = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

        if (!$this->DB):
            echo "NO EXISTE CONEXION A LA BASE DE DATOS";
        endif;
    }

    public function add($codigo, $descripcion, $precio) {
        $query = "INSERT INTO producto(codigo,descripcion,precio) ";
        $query .= " VALUES($codigo,'$descripcion','$precio')";
        $result = mysqli_query($this->DB, $query) or die(mysqli_error($this->DB));
        return $result;
    }

    public function delete($codigo) {
        $query = "DELETE FROM producto WHERE codigo= $codigo ";
        $result = mysqli_query($this->DB, $query) or die(mysqli_error($this->DB));
        return $result;
    }

    public function update($codigo, $descripcion, $precio) {
        $query = "UPDATE producto SET descripcion='$descripcion',precio='$precio' WHERE codigo = $codigo";

        $result = mysqli_query($this->DB, $query) or die(mysqli_error($this->DB));
        return $result;
    }

    public function alls($codigo) {
        $where = "";
        if (!empty($codigo)):
            $where = " where codigo = $codigo";
        endif;

        $query = "SELECT * FROM producto $where";
        $result = mysqli_query($this->DB, $query) or die(mysqli_error($this->DB));

        $data = array();
        $i = 0;

        if (mysqli_num_rows($result) > 0):
            while ($row = mysqli_fetch_array($result)):
                $data[$i] = [
                    "codigo" => $row["codigo"],
                    "descripcion" => $row["descripcion"],
                    "precio" => $row["precio"]
                ];

                $i++;
            endwhile;
        endif;

        return $data;
    }

    public function productoID($codigo) {

        $query = "SELECT * FROM producto where codigo = $codigo";
        $result = mysqli_query($this->DB, $query) or die(mysqli_error($this->DB));

        $data = array();
        $i = 0;

        if (mysqli_num_rows($result) > 0):
            while ($row = mysqli_fetch_array($result)):
                $data = [
                    "codigo" => $row["codigo"],
                    "descripcion" => $row["descripcion"],
                    "precio" => $row["precio"]
                ];

                $i++;
            endwhile;
        endif;

        $json["ok"] = true;
        $json["resultado"] = $data;
        $json["mensaje"] = "Registro encontrado";

        return $json;
    }

}

?>