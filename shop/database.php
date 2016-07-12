 <?php 
 class database
 {
	private static $host='kiranriya.db.9462939.hostedresource.com';
	private static $root='kiranriya';
	private static $pwd='Demo7@1212';
	private static $con=null;
	
	
	
	public static function connect()
	{
		self::$con=mysql_connect(self::$host,self::$root,self::$pwd);
		mysql_select_db('kiranriya',self::$con);
		return self::$con;
	}
	
	public static function disconnect()
	{
		mysql_close(self::$con);
		self::$con=null;
	}
	
	public function login($email,$pwd)
	{
		$con=database::connect();
		$res=mysql_query("select * from user_tbl where emil_id='$email' and password='$pwd'",$con);
		return $res;
		database::disconnect();
	}
	
	public function signup($eid,$pwd,$uname,$mobile,$city,$gender,$user_type)
	{
		$con=database::connect();
		$res=mysql_query("insert into user_tbl values('$eid','$pwd','$uname','$mobile','$city','$gender','user')",$con);
		return $res;
		database::disconnect();
	}
	
	/*public function pro_view($pro_id)
	{
		$con=database::connect();
		$res=mysql_query("select * from pro_tbl where pro_id='$pro_id'",$con);
		return $res;
		database::disconnect();
	}*/
	
	public function addtocart($amt,$pro_id,$email)
	{
		$con=database::connect();
		$res=mysql_query("insert into order_tbl values(NULL,'24/06/2016','$amt','1','$pro_id','$email','cart')",$con);
		return $res;
		database::disconnect();
	}
	
	public function addtowish($amt,$pro_id,$email)
	{
		$con=database::connect();
		$res=mysql_query("insert into order_tbl values(NULL,'24/06/2016','$amt','1','$pro_id','$email','wish')",$con);
		return $res;
		database::disconnect();
	}

	public function deletecart($o_id,$email)
	{
		$con=database::connect();
		$res=mysql_query("delete from order_tbl where o_id='$o_id' AND fk_email_id='$email'",$con);
		return $res;
		database::disconnect();
	}	
	
	public function view_cat($cat_id)
	{
		$con=database::connect();
		$res=mysql_query("select * from pro_tbl where fk_cat_id='$cat_id'",$con);
		return $res;
		database::disconnect();
	}

	public function dis_cart($email)
	{
		$con=database::connect();
		$res=mysql_query("select o.*,p.* from order_tbl as o,pro_tbl as p where o.fk_pro_id=p.pro_id AND o.fk_email_id='$email' AND o.flag='cart'",$con);
		return $res;
		database::disconnect();
	}
	
	public function dis_wish($email)
	{
		$con=database::connect();
		$res=mysql_query("select o.*,p.* from order_tbl as o,pro_tbl as p where o.fk_pro_id=p.pro_id AND o.fk_email_id='$email' AND o.flag='wish'",$con);
		return $res;
		database::disconnect();
	}
	
	public function view_user($email)
	{
		$con=database::connect();
		$res=mysql_query("select * from user_tbl where emil_id='$email'",$con);
		return $res;
		database::disconnect();
	}
	
	public function cat_count()
	{
		$con=database::connect();
		$res=mysql_query('select count(p.pro_id)"cnt",c.cat_id,c.cat_name,p.fk_cat_id from cat_tbl as c,pro_tbl as p where c.cat_id=p.fk_cat_id group by(c.cat_name)',$con);
		return $res;
		database::disconnect();
	}
	
	public function wish_delete($o_id,$email)
	{
		$con=database::connect();
		$res=mysql_query("delete from order_tbl where o_id='$o_id' AND fk_email_id='$email'",$con);
		return $res;
		database::disconnect();
	}
	
	public function pro_view()
	{
		$con=database::connect();
		$res=mysql_query("select p.*,c.* from pro_tbl as p,cat_tbl as c where c.cat_id=p.fk_cat_id",$con);
		return $res;
		database::disconnect();
	}
	
	public function pro_delete($id)
	{
		$con=database::connect();
		$res=mysql_query("delete from pro_tbl where pro_id='$id'",$con);
		return $res;
		database::disconnect();
	}
	
	public function pro_by_id($id)
	{
		$con=database::connect();
		$res=mysql_query("select * from pro_tbl where pro_id='$id'",$con);
		return $res;
		database::disconnect();
	}
	
	/*public function view_cat()
	{
		$con=database::connect();
		$res=mysql_query("select * from cat_tbl",$con);
		return $res;
		database::disconnect();
	}*/
	
	public function pro_add($name,$target_file,$detail,$price,$soh,$mfg,$warranty,$color,$cat_id)
	{
		$con=database::connect();
		$res=mysql_query("insert into pro_tbl values(NULL,'$name','$target_file','$detail','$price','$soh','$mfg','$warranty','$color','$cat_id')",$con);
		return $res;
		database::disconnect();
	}
	
	
	
	public function pro_update($name1,$photo,$price1,$soh1,$mfg1,$warranty1,$color1,$cat_id1,$id)
	{
		$con=database::connect();
		$res=mysql_query("update pro_tbl set pro_name='$name1',pro_image='$photo',pro_price='$price1',pro_soh='$soh1',pro_mfg='$mfg1',pro_warranty='$warranty1',pro_color='$color1',fk_cat_id='$cat_id1' where pro_id='$id'",$con);
		return $res;
		database::disconnect();
	}
}	
 ?>