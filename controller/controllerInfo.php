<?php
require_once('../model/class.info.php');
class ControllerInfo
{
    private $obj;
    function __construct()
    {
        $this->obj = new Info();
        $this->obj->conexao();
    }

    public function getTodosFunc()
    {
        $this->obj->conexao();
        $this->obj->getInfo();//Info
    }

    public function setInfo($camp1, $camp2, $camp3)//Info
    {
        $this->obj->insertInfo($camp1, $camp2, $camp3);
    }
    public function updateInfo($id_camp, $camp1, $camp2, $camp3)
    {
        $this->obj->updateInfo($id_camp, $camp1, $camp2, $camp3);
    }
    public function deleteInfo($id_camp)
    {
        $this->obj->delete_Info($id_camp);
    }

}
$objControl = new ControllerInfo();
if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['_incluir']) && $_POST['_incluir'] == "_incluir") {
        $objControl->setInfo($_POST['camp1'], $_POST['camp2'], $_POST['camp3']);

    } else if (isset($_POST['_update']) && $_POST['_update'] == "_update") {
        $objControl->updateInfo($_POST['id_camp'], $_POST['camp1'], $_POST['camp2'], $_POST['camp3']);
    }
}
if (isset($_GET['id_camp'])) {
    $objControl->deleteInfo($_GET['id_camp']);
}
