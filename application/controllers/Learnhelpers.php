<?php
  class Learnhelpers extends CI_Controller{

     public function __construct(){
         parent::__construct();
         $this->load->helper(array('array','string','form'));
         $this->load->library("session");
         //$this->load->helper("string");
     }

     public function my_form(){

         $this->load->view("myform");
     }

     public function string_helper(){
         //$string_random = random_string("alpha",20);
         //$string_random = random_string("alnum",20);
         //echo $string_random;

         $string = "file_1";// file_2, file_3, file_4

         //echo $string = increment_string($string); // file_2
         //echo "<br/>";
         //echo $string = increment_string($string); // file_3

         /*for ($i = 0; $i < 10; $i++)
          {
                  //echo alternator("A ","B ","C ","D ");
                  // string one, string two, string one, string two
          }*/

          echo repeater("Online Web Tutor ",10);
     }

     public function helper_class(){

        // element => array helper method
        $student_array = array(
          "name" => "Sanjay Kumar",
          "email" => "sanjay@gmail.com",
          "roll_no" => 21
        );

        //echo element("phone_no",$student_array,"1234567890");
        //echo element("email",$student_array);
        //$data = elements(array("email","roll_no","phone_no"),$student_array,"1234567890");
        //print_r($data);

        $info_array = array(
          "Apple",
          "Pine apple",
          "Mango"
        );

        echo random_element($info_array);
     }

     public function learn_captcha(){

        $this->load->helper("captcha");

        $config = array(
            'img_path'      => 'captcha_images/',
            'img_url'       => base_url().'captcha_images/',
            'font_path'     => 'system/fonts/texb.ttf',
            'img_width'     => '260',
            'img_height'    => 150,
            'word_length'   => 12,
            'font_size'     => 22
        );

        $captcha = create_captcha($config);

        $data["cap_image"] = $captcha['image'];

        $this->load->view("show_captcha",$data);
     }

     function my_captcha_form(){

       $this->load->helper("captcha");

       $config = array(
           'img_path'      => 'captcha_images/',
           'img_url'       => base_url().'captcha_images/',
           'font_path'     => 'system/fonts/texb.ttf',
           'img_width'     => '180',
           'img_height'    => 90,
           'word_length'   => 8,
           'font_size'     => 18
       );

       $captcha = create_captcha($config);

       $this->session->set_userdata("code",$captcha["word"]);

       $data["cap_image"] = $captcha['image'];
       $this->load->view("my_captcha_form",$data);
     }

     function my_captcha_form_submit(){

          $form_code = $this->input->post("txt_code");
          $saved_value = $this->session->userdata("code");
          if($form_code == $saved_value){
            echo "Captcha validated";
          }else{
            echo "captcha mismatched";
          }
     }

     function my_file_helper(){

       $this->load->helper("file");

       $file_path = "./files/";



       //echo delete_files($file_path);
       //$all_files = get_filenames("./application/config");
       //$all_files = get_dir_file_info("./application/config");
       $all_files = get_file_info("./application/config/config.php");
       echo "<pre>";
       print_r($all_files);

       // read file
       //$file_contents = read_file($file_path);
       //$file_contents = file_get_contents($file_path);

       //print_r($file_contents);
       //$updated_content = "Hey, This is all about codeigniter tutorial";
       //$write_status = write_file($file_path,$updated_content);

        //echo $write_status;



     }

   }
