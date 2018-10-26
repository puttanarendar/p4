<?php
 class Uploadmodel extends CI_model
 {
   public function save($data)
   {
	   $this->db->insert('tbl_excel',$data);
   }	
    public function check($data)
	   {
		  return $this->db->get_where("tbl_excel", $data)->result();
		}
    public function display()
		{

		return $this->db->query("select * from tbl_excel")->result();
		}
	  /* public function update($data)
	   {
		 $this->db->update("tbl_excel", array("vechicleno"=>$line[1], "vechicletype"=>$line[2],"fueltype"=>$line[3],"insurance"=>$line[4],"fitness"=>$line[5],"tax"=>$line[6],"permit"=>$line[7],"rc"=>$line[8],"pollution"=>$line[9],"seatingcapacity"=>$line[10],"vendorid"=>$line[11]));
	    }
	   */
   }

?>
