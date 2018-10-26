# p4
project(uploading the excel file into database)
<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Excel extends CI_Controller 
   {
	public function index()
	{
		$this->load->view('Page/fileupload');
	}
	public function do_upload()
	{
		ini_set('memory_limit','-1');
			$attached_file	=	$_FILES['excel']['name'];
			if($attached_file)
			{
			$file_path =  './Files/'.$attached_file;
			move_uploaded_file($_FILES['excel']['tmp_name'], $file_path);
			
			chmod($file_path,0777);
			
			include 'Classes/PHPExcel/IOFactory.php';
			try 
			{
				PHPExcel_Settings::setZipClass(PHPExcel_Settings::PCLZIP);
				$inputFileType = PHPExcel_IOFactory::identify($file_path);
				$objReader = PHPExcel_IOFactory::createReader($inputFileType);
		
				$objPHPExcel = $objReader->load($file_path);
			} 
			catch (Exception $e) 
			{
				die('Error loading file "' . pathinfo($file_path, PATHINFO_BASENAME) 
					. '": ' . $e->getMessage());
			}
			$sheet = $objPHPExcel->getSheet(0); 
			$highestRow = $sheet->getHighestDataRow();
			$highestColumn = $sheet->getHighestDataColumn();

			for ($row = 2; $row <= $highestRow; $row++) 
			{	
				$rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);
				
				$csv_array=$rowData[0];	
				//echo "<pre>";
				//print_r($csv_array);
				$line=$csv_array;
				 if($line== true)
	            {
					//echo "<pre>";
					//print_r($line);
					$this->load->model('Uploadmodel');
					$data=array("vechicleno"=>$line[1]);
					$result=$this->Uploadmodel->check($data);
					if(count($result) > 0){
	                    //update member data
	                    $this->db->update("tbl_excel", array("vechicleno"=>$line[1], "vechicletype"=>$line[2],"fueltype"=>$line[3],"insurance"=>$line[4],"fitness"=>$line[5],"tax"=>$line[6],"permit"=>$line[7],"rc"=>$line[8],"pollution"=>$line[9],"seatingcapacity"=>$line[10],"vendorid"=>$line[11]));
	                }else{
	                    //insert member data into database
	                   $this->load->model('Uploadmodel');
					   $data =array("vechicleno"=>$line[1], "vechicletype"=>$line[2],"fueltype"=>$line[3],"insurance"=>$line[4],"fitness"=>$line[5],"tax"=>$line[6],"permit"=>$line[7],"rc"=>$line[8],"pollution"=>$line[9],"seatingcapacity"=>$line[10],"vendorid"=>$line[11]);
					    $v=$this->Uploadmodel->save($data);
					   
	                }
	                 
                 }  					
				return redirect('Excel/display');
		
			}
			
		}
	
	
  }
  public function display(){
	   $this->load->model('Uploadmodel');
		$data['rows']=$this->Uploadmodel->display();
		$this->load->view('Page/fileview',$data);   
	  }
    public function button()
    {
		$data['rows']=$this->Uploadmodel->display();
		return redirect('Excel/display',$data);
	}
  }


?>
