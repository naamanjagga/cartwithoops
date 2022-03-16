<?php
session_start();
//session_destroy();
if (!isset($_SESSION['add'])) {
    $_SESSION['add'] = array();
}
if (!isset($_SESSION['buy'])) {
    $_SESSION['buy'] = array();
}
if (!isset($_SESSION['wish'])) {
    $_SESSION['wish'] = array();
}
?>
<?php
class cart
{

    public $id;
    public $name;
    public $image;
    public $price;
    public $quantity;

    function __construct($id, $name, $image, $price, $quantity)
    {
        $this->id = $id;
        $this->name = $name;
        $this->image = $image;
        $this->price = $price;
        $this->quantity = $quantity;
    }
    function addtocart()
    {
        $array1 = array($this->id,  $this->name,  $this->image,  $this->price,  $this->quantity);
        array_push($_SESSION['add'], $array1);
    }
    function buynow()
    {
        $array1 = array($this->id,  $this->name,  $this->image,  $this->price,  $this->quantity);
        array_push($_SESSION['buy'], $array1);
    }
    function addtowishlist()
    {
        $array1 = array($this->id,  $this->name,  $this->image,  $this->price,  $this->quantity);
        array_push($_SESSION['wish'], $array1);
    }
    function remove() {
        array_splice($_SESSION['add'], $this->id, 1);
        echo json_encode($_SESSION['add']);
    }
    function remove1() {
        array_splice($_SESSION['buy'], $this->id, 1);
        echo json_encode($_SESSION['buy']);
    }
    function remove2() {
        array_splice($_SESSION['wish'], $this->id, 1);
        echo json_encode($_SESSION['wish']);
    }
    function add1() {
        array_push($_SESSION['add'], $_SESSION['buy'][$this->id]);
        array_splice($_SESSION['buy'], $this->id, 1);
        echo json_encode($_SESSION['add']);
    }
    function add2() {
        array_push($_SESSION['add'], $_SESSION['wish'][$this->id]);
        array_splice($_SESSION['wish'], $this->id, 1);
        echo json_encode($_SESSION['add']);
    }
    function buy1() {
        array_push($_SESSION['buy'], $_SESSION['add'][$this->id]);
        array_splice($_SESSION['add'], $this->id, 1);
        echo json_encode($_SESSION['buy']);
    }
    function buy2() {
        array_push($_SESSION['buy'], $_SESSION['wish'][$this->id]);
        array_splice($_SESSION['wish'], $this->id, 1);
        echo json_encode($_SESSION['buy']);
    }
    function wish1() {
        array_push($_SESSION['wish'], $_SESSION['add'][$this->id]);
        array_splice($_SESSION['add'], $this->id, 1);
        echo json_encode($_SESSION['wish']);
    }
    function wish2() {
        array_push($_SESSION['wish'], $_SESSION['buy'][$this->id]);
        array_splice($_SESSION['buy'], $this->id, 1);
        echo json_encode($_SESSION['wish']);
    }
}
if (isset($_POST['action']) && $_POST['action'] == "addToCart") {
    $obj = new cart($_POST['id'], $_POST['name'], $_POST['image'], $_POST['price'], 1);
    $obj->addtocart();
    echo json_encode($_SESSION['add']);
}
if (isset($_POST['action']) && $_POST['action'] == "buyNow") {
    $obj = new cart($_POST['id'], $_POST['name'], $_POST['image'], $_POST['price'], 1);
    $obj->buynow();
    echo json_encode($_SESSION['buy']);
}
if (isset($_POST['action']) && $_POST['action'] == "addToWishlist") {
    $obj = new cart($_POST['id'], $_POST['name'], $_POST['image'], $_POST['price'], 1);
    $obj->addtowishlist();
    echo json_encode($_SESSION['wish']);
}
if (isset($_POST['action']) && $_POST['action'] == "remove") {
    $id = $_POST['id'];
    $obj = new cart($_POST['id'], $_POST['name'], $_POST['image'], $_POST['price'], 1);
    $obj->remove();
  
}
if (isset($_POST['action']) && $_POST['action'] == "remove1") {
    $id = $_POST['id'];
    $obj = new cart($_POST['id'], $_POST['name'], $_POST['image'], $_POST['price'], 1);
    $obj->remove1();
  
}
if (isset($_POST['action']) && $_POST['action'] == "remove2") {
    $obj = new cart($_POST['id'], $_POST['name'], $_POST['image'], $_POST['price'], 1);
    $obj->remove2();
  
}
if (isset($_POST['action']) && $_POST['action'] == "add1") {
    $obj = new cart($_POST['id'], $_POST['name'], $_POST['image'], $_POST['price'], 1);
    $obj->add1();

}
if (isset($_POST['action']) && $_POST['action'] == "add2") {
    $obj = new cart($_POST['id'], $_POST['name'], $_POST['image'], $_POST['price'], 1);
    $obj->add2();

}
if (isset($_POST['action']) && $_POST['action'] == "buy1") {
    $obj = new cart($_POST['id'], $_POST['name'], $_POST['image'], $_POST['price'], 1);
    $obj->buy1();

}
if (isset($_POST['action']) && $_POST['action'] == "buy2") {
    $obj = new cart($_POST['id'], $_POST['name'], $_POST['image'], $_POST['price'], 1);
    $obj->buy2();

}
if (isset($_POST['action']) && $_POST['action'] == "wish1") {
    $obj = new cart($_POST['id'], $_POST['name'], $_POST['image'], $_POST['price'], 1);
    $obj->wish1();

}
if (isset($_POST['action']) && $_POST['action'] == "wish2") {
    $obj = new cart($_POST['id'], $_POST['name'], $_POST['image'], $_POST['price'], 1);
    $obj->wish2();

}
?>
