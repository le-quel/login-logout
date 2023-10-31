<?php
session_start();
ob_start();

    include "./dao/pdo.php";
    connectdb();
    include "./dao/user.php";
    include "./dao/spfunc.php";
    include "./view/header.php";
    if (isset($_GET['act'])) {
        switch ($_GET['act']) {
            case 'dangnhap':
                include "view/login.php";
                break;
                case 'dangky':
                    include "view/signup.php";
                    break; 
            case 'logout':
                if(isset($_SESSION['s_user'])&&(count($_SESSION['s_user'])>0))
                {
                    unset($_SESSION['s_user']);
                }
                header('location: index.php');
                break;
            case 'login':
                if(isset($_POST["dangnhap"])&&($_POST["dangnhap"])){
                    $name=$_POST["name"];
                    $password=$_POST["password"];
                    
                    // xử lý
                    
                    $kq=checkuser($name,$password);
    
                 
                    if (is_array($kq)&&(count($kq))) {
                        $_SESSION['s_user']=$kq;
                        header('location: index.php');
                    }else{
                        $tb="Tài khoản không tồn tại hoặc thông tin đăng nhập sai";
                        $_SESSION['tb_dangnhap']=$tb;
                        header('location: index.php?act=dangnhap');
                    }
                    
                }
              
                break;
            case 'sanpham':
                $kq=getall_dm();
                $dssp = getnewproduct_2table();
                include "view/mainsanpham.php";
                    break; 
                case 'adspadd':
                    if((isset($_POST['themmoi']))&&($_POST['themmoi'])){
                        $iddm=$_POST['iddm'];
                        $name=$_POST['name'];
                        $price=$_POST['price'];
                        $giacu= $_POST['giacu'];
                        // if($_FILES['image']['name']!="") $image=$_FILES['image']['name']; else $image="";
                      $target_dir = "./uploaded/";
                      $target_file = $target_dir . basename($_FILES['image']['name']);
                      $image=$target_file;
                      $uploadOk = 1;
                      $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                      if($imageFileType != "jpg" && $imageFileType !="png" && $imageFileType !="jpeg"
                      && $imageFileType != "gif"){
                        $uploadOk = 0;
                      }
                      move_uploaded_file($_FILES['image']['tmp_name'],$target_file);
                        insert_sanpham($iddm,$name,$image,$price,$giacu);
                    } 
                    
                    // load all danh mục 
                    $kq=getall_dm();
                    // loa all sản phẩm 
                    
                    // $dssp = getnewproduct();
                    $dssp = getnewproduct_2table();
                    include "view/sanpham.php";
                        break;
                case 'updatesp':
        
                     // load all danh mục 
                     $kq=getall_dm();
        
                     $dssp = getnewproduct_2table();
                    if(isset($_POST['capnhat'])&&($_POST['capnhat'])){
                        $iddm=$_POST['iddm'];
                        $name=$_POST['name'];
                        $price=$_POST['price'];
                        $id=$_POST['id'];
                        $giacu= $_POST['giacu'];
                        if($_FILES['image']['name']!=""){
                            $target_dir = "./uploaded/";
                      $target_file = $target_dir . basename($_FILES['image']['name']);
                      $image=$target_file;
                      $uploadOk = 1;
                      $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                      if($imageFileType != "jpg" && $imageFileType !="png" && $imageFileType !="jpeg"
                      && $imageFileType != "gif"){
                        $uploadOk = 0;
                      }
                      move_uploaded_file($_FILES['image']['tmp_name'],$target_file);
                      updatesp($id,$name,$image,$price,$giacu,$iddm);
                    } 
                        }else{
                            $image="";
                        
                    }      
                    if(isset($_GET['id'])&&($_GET['id']>0)){
                           $id=$_GET['id'];
                          
                             $kqsp=getonesp($_GET['id']);
                         }
                    // $kqsp=getonesp($id);
                    $dssp = getnewproduct_2table();
                    // $dssp = getnewproduct();
                  
                    include "view/updatesp.php";
                    break;
                case 'delsp':
                    if(isset($_GET['id'])){
                        $id=$_GET['id'];
                        delsp($id);
                    }
                    $dssp = getnewproduct_2table();
                    // $dssp = getnewproduct();
                    header('location: index.php');
                    
                
                    break; 
                default: 
                    $dssp = getnewproduct_2table();
                    include "./view/mainsanpham.php";
                        break; 
            }
        }  else {
            $dssp = getnewproduct_2table();
            include "./view/mainsanpham.php";
        }
   

?>