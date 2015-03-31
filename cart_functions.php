<?php

include_once("adb.php");
class cart_functions extends adb{
	function cart_functions(){
		adb::adb();
	}

	function add_customer($firstname,$lastname,$gender,$date_of_birth,$home_address,$email_address,$phone_number,
		$username,$customer_password){
		$sql_query="INSERT INTO customer(firstname,lastname,gender,date_of_birth,home_address,email_address,
		phone_number,username,customer_password) VALUES ('$firstname','$lastname','$gender','$date_of_birth',
		'$home_address','$email_address','$phone_number','$username','$customer_password')";
		if (!$this->query($sql_query)){
			return false;
		}
        echo "Worked";
		return true;
	}

	function delete_customer($customer_id){
		$sql_query="DELETE FROM customer WHERE customer_id=$customer_id";
		if (!$this->query($sql_query)){
			return false;
		}
		return true;
	}

	function update_customer($firstname,$lastname,$gender,$date_of_birth,$home_address,$email_address,$phone_number,
		$username,$customer_password){
		$sql_query="UPDATE customer SET firstname='$firstname',lastname='$lastname',gender='$gender',date_of_birth=
		'$date_of_birth',home_address='$home_address',email_address='$email_address',phone_number='$phone_number',
		username='$username',customer_password='$customer_password'";
		if (!$this->query($sql_query)){
			return false;
		}
		return true;
	}

	function get_customer(){
		$sql_query="SELECT customer_id,firstname,lastname,gender,date_of_birth,home_address,email_address,
		phone_number,username,customer_password FROM customer";
		if (!$this->query($sql_query)){
			return false;
		}
		return true;
	}

	function add_category($category_name){
		$sql_query="INSERT INTO category(category_name) VALUES ('$category_name')";
		if (!$this->query($sql_query)){
			return false;
		}
		return true;
	}

	function delete_category($category_id){
		$sql_query="DELETE FROM category WHERE category_id=$category_id";
		if (!$this->query($sql_query)){
			return false;
		}
		return true;
	}

	function update_category($category_name){
		$sql_query="UPDATE category SET category_name='$category_name'";
		if (!$this->query($sql_query)){
			return false;
		}
		return true;
	}


	function get_category(){
		$sql_query="SELECT category_id,category_name FROM category";
		if (!$this->query($sql_query)){
			return false;
		}
		return true;
	}

	function add_color($color_name){
		$sql_query="INSERT INTO color(color_name) VALUES ('$color_name')";
		if (!$this->query($sql_query)){
			return false;
		}
		return true;
	}

	function delete_color($color_id){
		$sql_query="DELETE FROM color WHERE color_id=$color_id";
		if (!$this->query($sql_query)){
			return false;
		}
		return true;
	}

	function update_color($color_name){
		$sql_query="UPDATE color SET color_name='$color_name'";
		if (!$this->query($sql_query)){
			return false;
		}
		return true;
	}

	function get_color(){
		$sql_query="SELECT color_id,color_name FROM color";
		if (!$this->query($sql_query)){
			return false;
		}
		return true;
	}

	function add_product($product_name,$description,$image,$fk_category_id,$quantity,$fk_color_id,$price,$last_updated){
		$sql_query="INSERT INTO product(product_name,description,image,fk_category_id,quantity,fk_color_id,price,
		last_updated) VALUES ('$product_name','$description','$image',$fk_category_id,$quantity,$fk_color_id,$price,
		'$last_updated')";
		if (!$this->query($sql_query)){
			return false;
		}
		return true;
	}

	function delete_product($product_id){
		$sql_query="DELETE FROM product WHERE product_id=$product_id";
		if (!$this->query($sql_query)){
			return false;
		}
		return true;
	}

	function update_product($product_name,$description,$image,$fk_category_id,$quantity,$fk_color_id,$price,$last_updated){
		$sql_query="UPDATE product SET product_name='$product_name',description='$description',image='$image',
		fk_category_id=$fk_category_id,quantity=$quantity,fk_color_id=$fk_color_id,price=$price,last_updated=
		'$last_updated'";
		if (!$this->query($sql_query)){
			return false;
		}
		return true;
	}

	function get_product($start,$num_records_per_page){
		$sql_query="SELECT product_id,product_name,description,imagelocation,fk_category_id,quantity,fk_color_id,price,
		last_updated FROM product LIMIT $start,$num_records_per_page";
		if (!$this->query($sql_query)){
			return false;
		}
		return true;
	}

    function get_product_by_id($product_id){
        $sql_query="SELECT product_id,product_name,description,imagelocation,fk_category_id,quantity,fk_color_id,price,
		last_updated FROM product WHERE product_id =".$product_id;
        if (!$this->query($sql_query)){
            return false;
        }
        return true;
    }

    function get_products_inCategory($cat){
        $sql_query="SELECT product_id,product_name,description,imagelocation,fk_category_id,quantity,fk_color_id,price,
		last_updated FROM product WHERE fk_category_id=".$cat;
        if (!$this->query($sql_query)){
            return false;
        }
        return true;
    }

    function product_details(){
        $sql_query="SELECT product_name,description,imagelocation,category_name,quantity,color_name,price,last_updated
        FROM product INNER JOIN category ON (category_id=fk_category_id) INNER JOIN color ON (color_id=fk_color_id)";
        if (!$this->query($sql_query)){
            return false;
        }
        return true;
    }

    function product_details_by_id($product_id){
        $sql_query="SELECT product_name,description,imagelocation,category_name,quantity,color_name,price,last_updated
        FROM product INNER JOIN category ON (category_id=fk_category_id) INNER JOIN color ON (color_id=fk_color_id)
        WHERE product_id =".$product_id;
        if (!$this->query($sql_query)){
            return false;
        }
        return true;
    }

    function get_product_quantity($product_id){
        $sql_query="SELECT quantity FROM product WHERE product_id=".$product_id;

        if (!$this->query($sql_query)){
            return false;
        }
        return $this->fetch();
    }

	function add_order($order_status,$order_date,$fk_customer_id){
		$sql_query="INSERT INTO order_table(order_status,order_date,fk_customer_id) VALUES ('$order_status',$order_date,$fk_customer_id)";
		if (!$this->query($sql_query)){
			return false;
		}
		return true;
	}

	function delete_order($order_id){
		$sql_query="DELETE FROM order_table WHERE order_id=$order_id";
		if (!$this->query($sql_query)){
			return false;
		}
		return true;
	}

	function update_order($order_status,$order_date,$fk_customer_id){
		$sql_query="UPDATE order_table SET order_status='$order_status',order_date='$order_date',fk_customer_id=$fk_customer_id";
		if (!$this->query($sql_query)){
			return false;
		}
		return true;
	}

	function get_order(){
		$sql_query="SELECT order_id,order_status,order_date,fk_customera_id FROM order_table";
		if (!$this->query($sql_query)){
			return false;
		}
		return true;
	}

    function get_order_id(){
        $sql_query="SELECT order_id FROM order_table";
        if (!$this->query($sql_query)){
            return false;
        }
        return true;
    }

    function get_order_by_id($order_id){
        $sql_query="SELECT count(order_id) as orderID FROM order_table WHERE order_id=".$order_id;
        $this->query($sql_query);
        $row = $this->fetch();
        if($row['orderID'] == 1)
        {
            return true;
        }
        return false;
    }

    function get_order_status($order_id){
        $sql_query="SELECT order_status FROM order_table WHERE order_id=".$order_id;
        if (!$this->query($sql_query)){
            return false;
        }
        return true;
    }

    function change_order_status($order_id){
        $sql_query="UPDATE order_table SET order_status='Cancelled' WHERE order_id=".$order_id;
        if (!$this->query($sql_query)){
            return false;
        }
        return true;
    }

	function add_details($fk_order_id,$fk_product_id,$quantity){
		$sql_query="INSERT INTO order_details (fk_order_id,fk_product_id,quantity) VALUES ($fk_order_id,$fk_product_id,$quantity)";
		if (!$this->query($sql_query)){
			return false;
		}
		return true;
	}

	function delete_details($details_id){
		$sql_query="DELETE FROM order_details WHERE details_id=$details_id";
		if (!$this->query($sql_query)){
			return false;
		}
		return true;
	}

	function update_details($fk_order_id,$fk_product_id,$quantity){
		$sql_query="UPDATE order_details SET fk_order_id=$fk_order_id,fk_product_id=$fk_product_id,quantity=$quantity";
		if (!$this->query($sql_query)){
			return false;
		}
		return true;
	}

	function get_details(){
		$sql_query="SELECT details_id,fk_order_id,fk_product_id,quantity FROM order_details";
		if (!$this->query($sql_query)){
			return false;
		}
		return $this->fetch();
	}

    function get_order_details_by_id($details_id){
        $sql_query="SELECT firstname,lastname,order_id,product_name,order_status,order_date FROM order_details INNER JOIN customer ON (fk_customer_id=customer_id)
        INNER JOIN order_table ON (fk_order_id=order_id) INNER JOIN product ON (fk_product_id=product_id) WHERE details_id=".$details_id;
        if (!$this->query($sql_query)){
            return false;
            echo mysql_error();
        }
        return true;
    }

    function add_tags($tag_name){
        $sql_query="INSERT INTO tags (tag_name) VALUES ('$tag_name')";
        if (!$this->query($sql_query)){
            return false;
        }
        return true;
    }

    function delete_tags($tag_id){
        $sql_query="DELETE FROM tags WHERE tag_id=$tag_id";
        if (!$this->query($sql_query)){
            return false;
        }
        return true;
    }

    function update_tags($tag_name){
        $sql_query="UPDATE tags SET tag_name='$tag_name'";
        if (!$this->query($sql_query)){
            return false;
        }
        return true;
    }

    function get_tags(){
        $sql_query="SELECT tag_id,tag_name FROM tags";
        if (!$this->query($sql_query)){
            return false;
        }
        return true;
    }

    function add_product_tags($fk_product_id,$fk_tags_id){
        $sql_query="INSERT INTO product_has_tags(fk_product_id,fk_tags_id) VALUES ($fk_product_id,$fk_tags_id)";
        if (!$this->query($sql_query)){
            return false;
        }
        return true;
    }

    function delete_product_tags($ph_id){
        $sql_query="DELETE FROM product_has_tags WHERE ph_id=$ph_id";
        if (!$this->query($sql_query)){
            return false;
        }
        return true;
    }

    function update_product_tags($fk_product_id,$fk_tags_id){
        $sql_query="UPDATE product_has_tags SET fk_product_id=$fk_product_id,fk_tags_id=$fk_tags_id";
        if (!$this->query($sql_query)){
            return false;
        }
        return true;
    }

    function get_product_tags(){
        $sql_query="SELECT ph_id,fk_product_id,fk_tags_id FROM product_has_tags";
        if (!$this->query($sql_query)){
            return false;
        }
        return true;
    }

    function advertisement($fk_product_id){
        $sql_query="select product_id, tag_id from product, tags, product_has_tags
        where product_id=fk_product_id and tag_id=fk_tags_id and product_id=".$fk_product_id;
        if (!$this->query($sql_query)){
            return false;
        }
        return true;
    }

    function get_product_by_tagID($tag_id){
        $sql_query="select product_name, tag_name from product, tags, product_has_tags
        where product_id=fk_product_id and tag_id=fk_tags_id and fk_tags_id=".$tag_id;
        if (!$this->query($sql_query)){
            return false;
        }
        return true;
    }

//    function search($word){
//        $sql_query=sprintf("SELECT product_id,product_name,description,imagelocation,fk_category_id,quantity,fk_color_id,price,
//		last_updated FROM product WHERE product_name LIKE '%s' OR description LIKE '%s'",'%'.$word.'%','%'.$word.'%');
//
//        if (!$this->query($sql_query)){
//            return false;
//        }
//        return true;
//    }

    function search($word){
        $sql_query="SELECT * FROM product WHERE MATCH (product_name, description) AGAINST ('$word' IN BOOLEAN MODE)";

        if (!$this->query($sql_query)){
            return false;
        }
        return true;
    }





}