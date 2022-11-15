<?php

//  include './inc/db.php';
//  include './inc/form.php';
//  include './inc/select.php';
//  include './inc/db_dose.php';




 $conn = mysqli_connect('localhost', 'root', 'root', 'kk.php');
 if(!$conn){
     echo 'error: ' . mysqli_connect_error();
   }
   


   $firstName =  $_POST['firstName'];
   $lastName =  $_POST['lastName'];
   $email =  $_POST['email'];
   
   
   if (isset($_post['submit'])){

  

   if(empty($firstName)){
    $errors['firstNameError'] = 'يرجى ادخال الاسم الاول';
  }


  if(empty($lastName)){
   $errors['lastNameError'] = 'يرجى ادخال الاسم الاخير';
     }


     if(empty($email)){
       $errors['emailError'] = 'ادخل الايميل ';
     }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
       $errors['emailError'] = ' ادخل الايميل الصحيح';
     }


     if(!array_filter($errors)){


       
       $firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
   $lastName =  mysqli_real_escape_string($conn,$_POST['lastName']);
   $email =  mysqli_real_escape_string($conn,$_POST['email']);

   $sql = "INSERT INTO users(firstName, lastName, email)
           values ('$firstName','$lastName','$email') ";


if(mysqli_query($conn, $sql)){
 header('location: index.php');
}else{
 echo 'Error: ' . mysqli_error($conn);
}
     }

       
     



     
     }




     $sql ='SELECT * FROM users ORDER BY RAND() LIMIT 1 ';
     $result = mysqli_query($conn, $sql);
     $users = mysqli_fetch_all($result, MYSQLI_ASSOC);















echo "صفحة السحب";
?>
<!DOCTYPE html>
<html lang="en" dir= "rtl" >
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" hreh=".css/style.css">
    <title>Document</title>
</head>
<body>
    
<?php foreach($users as $user): ?>
<h1> <?php echo htmlspecialchars($user['firstName']) . ' ' . htmlspecialchars($user['lastName'])  . '<br> ' . htmlspecialchars($user['email']) ; ?> </h1>





<?php endforeach; ?>


<div class="container">
<div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light">
<div class="col-md-5 p-lg-5 mx-auto my-5">
<h1 class="display-4 fw-normal">اربح مع سعيد </h1>
<img src="../sae.jpg" width="150" height="150">
<p class="lead fw-normal">باقي على فتح التسجيل </p>
<h3 id="demo"></h3>
<p class="lead fw-normal">لسحب على نسخه مجانيه من البرنامج  </p>
<a class="btn btn-outline-secondary" href="#">Coming soon</a>
</div>
</div>




<script>
var countDownDate = new Date("October 19, 2022 11:18:25").getTime();
var x = setInterval(function() {
  var now = new Date().getTime();
  var distance = countDownDate - now;
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
  document.getElementById("demo").innerHTML = days + " يوم " + hours + " ساعة "
  + minutes + " دقيقة " + seconds + " ثانيه ";
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "لقد وصلت متاخرا";
  }
}, 1000);
</script>







<ul class="list-group list-group-flush">
<li class="list-group-item">تابع البث المباشر صفحتي على الفيس اعلاه</li>
<li class="list-group-item">ساقوم ببث لمدة ساعه عبارة عبارة عن اسئلة واجوبة للجميع  </li>
<li class="list-group-item"> خلال الفترة الساعات القادمة سيتم فتح صفحة التسجيل هنا حيث ستقوم بتسجيل اسمك و ايميلك</li>
<li class="list-group-item"> في نهاية البث سيتم اختيار فايز واحد من قاعده البيانات بشكل عشوائي </li>
<li class="list-group-item">الرابح سيحصل على نسخه مجاني من البرنامج كماتيا</li>
</ul>

<div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light">
<div class="col-md-5 p-lg-5 mx-auto my-5">

  
      <div class="container">
    <div class ="position-relative text-center">
      <div class="col-md-5 p-lg-5 mx-auto my-5">
        
        <form class="mt-5" action="index.php" method="POST">
        <h3>الرجاء ادخل معلوماتك</h3>

          <div class="mb-3">
            <label for="firstName" class="form-label">الاسم الاول</label>
            <input type="text" name="firstName" class="form-control" id="firstName" value="<?php echo $firstName ?>">
            <div  class="form-text Error"><?php echo $errors['firstNameError'] ?></div>
          </div>

          <div class="mb-3">
            <label for="lastName" class="form-label">الاسم الاخير</label>
            <input type="text" name="lastName" class="form-control" id="lastName" value="<?php echo $lastName ?>">
            <div  class="form-text Error"><?php echo $errors['lastNameError'] ?></div>
          </div>

          <div class="mb-3">
            <label for="email" class="form-label">البريد الالكتروني</label>
            <input type="text" name="email" class="form-control" id="exampleInputEmail1" value="<?php echo $emai ?>">
            <div  class="form-text Error"><?php echo $errors['emailError'] ?></div>
          </div>


          <button type="submit"  name="submit" class="btn btn-primary">ارسال المعلومات</button>
        </form>
      </div>
    </div>
  </div>

  <div class="loader-con">
  <div id="loader">
	<canvas id="circularLoader" width="200" height="200"></canvas>
</div>
</div>



<div class="d-grid gap-2 col-6 mx-auto my-5"> 
<button type="button" id="winner" class="btn btn-primary" >
اختيار الرابح
</button>
</div>

<div class="modal fade" id="modal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
      
        <h5 class="modal-title" id="modalLabel">الرابح في المسابقة</h5>
        
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <?php foreach($users as $user) : ?>
        <h1 class="display-3 text-center modal-title" id="modalLabel"><?php echo htmlspecialchars($user['firstName']).' '. htmlspecialchars($user['lastName'])?></h1>
        <?php endforeach; ?>
      </div>
     
    </div>
  </div>
</div>







<div class="col-sm-6">
<div class="card">
<div class="card-body">
<h5 class="card-title"><?php echo htmlspecialchars($user['firstname']).' '. htmlspecialchars($user['lastname'])?></h5>
<p class="card-text"><?php echo htmlspecialchars($user['email']); ?></p>


</div>
</div>
</div>






</body>
</html>












