<?php
// initialize shopping cart class
include 'Cart.php';
$cart = new Cart;

// include database configuration file
include 'connect.php';
if(isset($_REQUEST['action']) && !empty($_REQUEST['action'])){
    if($_REQUEST['action'] == 'addToCart' && !empty($_REQUEST['id'])){
        $productID = $_REQUEST['id'];
        // get product details

        $query = ("SELECT * FROM products WHERE id = ".$productID);
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $num = $stmt->rowCount();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        //$row = $query->fetch_assoc();
        $itemData = array(
            'id' => $row['id'],
            'name' => $row['name'],
            'price' => $row['price'],
            'qty' => 1
        );

        $insertItem = $cart->insert($itemData);
        $redirectLoc = $insertItem?'viewCart.php':'index.php';
        header("Location: ".$redirectLoc);
    }elseif($_REQUEST['action'] == 'updateCartItem' && !empty($_REQUEST['id'])){
        $itemData = array(
            'rowid' => $_REQUEST['id'],
            'qty' => $_REQUEST['qty']
        );
        $updateItem = $cart->update($itemData);
        echo $updateItem?true:'err';die;
    }elseif($_REQUEST['action'] == 'removeCartItem' && !empty($_REQUEST['id'])){
        $deleteItem = $cart->remove($_REQUEST['id']);
        header("Location: viewCart.php");
    }elseif($_REQUEST['action'] == 'placeOrder' && $cart->total_items() > 0 && !empty($_SESSION['sessCustomerID'])){
        // insert order details into database
        $insertOrder = "INSERT INTO orders (user_id, total_price, `date`) VALUES ('".$_SESSION['sessCustomerID']."', '".$cart->total()."', '".date("Y-m-d H:i:s")."')";
        $stmt = $pdo->prepare($insertOrder);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if($stmt){
            $orderID = $pdo->lastInsertId();
            $sql = '';
            // get cart items
            $cartItems = $cart->contents();
            foreach($cartItems as $item){
                $sql = "INSERT INTO order_detail (order_id, product_id, price, quantity) VALUES ('".$orderID."', '".$item['id']."', '".$item['price']."', '".$item['qty']."')";
                $exec = $pdo->prepare($sql);
                $exec->execute();
            }
            // insert order items into database
            //$insertOrderItems = $pdo->multi_query($sql);


            if($exec){
                $cart->destroy();
                header("Location: orderSuccess.php?id=$orderID");
            }else{
                header("Location: checkout.php");
            }
        }else{
            header("Location: checkout.php");
        }
    }else{
        header("Location: index.php");
    }
}else{
    header("Location: index.php");
}
