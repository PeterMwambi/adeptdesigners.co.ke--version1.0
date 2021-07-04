<?php

class Cart
{
    /**
     * @var object $conn
     * The connection object
     */
    private $conn = null;
    /**
     * @var object $name
     * The product name
     */
    private $name = null;
    /**
     * @var int $id
     * The product Id
     */
    private $id = null;
    /**
     * @var int $price
     * The product price
     */
    private $price = null;
    /**
     * @var int $quantity
     * The product quantity
     */
    private $quantity = 1;
    /**
     * @var array $item
     * The generated item array
     */
    private $item = [];
    /**
     * @var array cart
     * The cart array
     */
    private $cart = [];
    /**
     * @car array $products
     * The products in the cart
     */
    private $products = [];
    /**
     * @param int $id The product id
     * @return mixed (false/array)
     * Initialize cart and item variables, gets the product id
     * Connects to the database
     */
    public function __construct($id)
    {
        $this->item = array("name" => "", "price" => 0, "quantity" => 1, "total_price" => 0);
        $this->cart = array("total_items" => 0, "total_price" => 0, "items" => array());
        $this->id = $id;
        if (isset($id)) {
            $this->conn = Database::getInstance();
        }
        return false;
    }
    /**
     * @param null
     * @return bool
     */
    public function setItem()
    {
        if (!isset($this->id)) {
            return false;
        }
        $this->conn->generateSelectQuery(array("*"), "products", 1, array("product_id", "=", $this->id));
        if ($this->conn->getUserCount()) {
            $results  = $this->conn->getOutput();
            $this->name = $results->product_name;
            $this->price = $results->price;
        }
        if (isset($this->name, $this->price, $this->id, $this->quantity)) {
            $this->price = (int) $this->price;
            $this->item = array("id" => $this->id, "name" => $this->name, "price" => $this->price, "quantity" => $this->quantity);
            return true;
        } else {
            return false;
        }
    }
    /**
     * @param null
     * @return bool
     */
    public function insert()
    {
        if ($this->setItem() && isset($this->item)) {
            if ($this->item["quantity"] === 0) {
                return false;
            }
            $total = $this->item["price"] * $this->item["quantity"];
            $this->item["total_price"] = $total;
            if ($this->storage()) {
                return true;
            }
            return false;
        }
        return false;
    }
    /**
     * @param null
     * @return bool
     */
    protected function storage()
    {
        if (!is_array($this->item)) {
            return false;
        }
        if (isset($this->item)) {
            $this->cart["total_items"] = 0;
            $this->cart["items"] = $this->item;
            $this->cart["total_price"] = $this->item["total_price"];
            $cart = Session::getValue("cart");
            if (Session::exists("cart")) {
                for ($x = 0; $x < count(Session::getValue("cart")); $x++) {
                    if (in_array($this->id, $cart[$x]["items"])) {
                        return false;
                    }
                }
            }
            Session::generate("cart", $this->cart, "array");
        }
    }
    /**
     * @param null
     * @return bool
     */
    public function getTotalPrice()
    {
        if (Session::exists("cart")) {
            $this->cart = Session::getValue("cart");
            for ($x = 0; $x < count($this->cart); $x++) {
                $this->cart["total_price"] += array_sum(array($this->cart[$x]["items"]["total_price"]));
            }
            Session::generate("total_price", $this->cart["total_price"]);
            return $this->cart["total_price"];
        }
    }
    /**
     * @param null
     * @return bool
     */
    public function getTotalItems()
    {
        if (Session::exists("cart")) {
            $this->cart = Session::getValue("cart");
            for ($x = 0; $x < count($this->cart); $x++) {
                $this->cart["total_items"] = count(Session::getValue("cart"));
            }
            Session::generate("total_items", $this->cart["total_items"]);
            return $this->cart["total_items"];
        }
    }
    /**
     * @param null
     */
    public function displayItems()
    {
        if (Session::exists("cart")) {
            $this->cart = Session::getValue("cart");
            for ($x = 0; $x < count($this->cart); $x++) {
                if ($this->cart[$x]["total_price"] === 0 && $this->cart[$x]["total_items"] === 0) {
                    unset($this->cart[$x]);
                }
            }
        }

        $this->cart = array_values($this->cart);
        return array_reverse($this->cart);
    }

    /**
     * @param null
     * @return bool
     */
    public function displayQuantity(int $id = null)
    {
        if (Session::exists("cart")) {
            $this->cart = Session::getValue("cart");
            $quantity = 0;
            for ($i = 0; $i < count($this->cart); $i++) {
                if ((int) $this->cart[$i]["id"] === $id) {
                    $quantity = $this->cart[$i]["items"]["quantity"];
                }
            }
            return $quantity;
        }
        return false;
    }
    /**
     * @param null
     * @return mixed
     */
    public function delete(int $id = null)
    {
        if (Session::exists("cart")) {
            $this->cart = Session::getValue("cart");
            for ($i = 0; $i < count($this->cart); $i++) {
                if ((int) $this->cart[$i]["items"]["id"] === $id) {
                    unset($this->cart[$i]);
                    $this->cart = array_values($this->cart);
                }
                Session::generate("cart", $this->cart);
            }
        }
        return false;
    }
    /**
     * @param null
     * @return mixed
     */
    public function update(int $id = null, int $quantity = null)
    {
        if (!is_numeric($quantity) || $quantity < 0) {
            return false;
        }
        if (Session::exists("cart")) {
            $this->cart = Session::getValue("cart");
            Session::generate("quantity", $id);
            for ($i = 0; $i < count($this->cart); $i++) {
                if ((int) $this->cart[$i]["id"] === $id) {
                    $this->cart[$i]["items"]["quantity"] = $quantity;
                    $this->cart[$i]["items"]["total_price"] = $this->cart[$i]["items"]["quantity"] * $this->cart[$i]["items"]["price"];
                    $this->cart = array_values($this->cart);
                }
                Session::generate("cart", $this->cart);
            }
            return;
        }
    }
    /**
     * @param null
     * @return bool
     */
    public function destroyCart()
    {
        if (Session::exists("cart")) {
            Session::destroy("cart");
            Session::destroy("item");
            Session::destroy("products");
            Session::destroy("total_items");
            return true;
        }
        return false;
    }
}
