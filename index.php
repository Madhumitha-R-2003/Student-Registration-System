
<!DOCTYPE html>
<html>
<head>
    <title>Student Registration System</title>
     <link rel="stylesheet" href="assets/css/style.css">
</head>

<script>
function updatecourses(){
let dept=document.querySelector('input[name="department"]:checked');
let courseselect=document.getElementById("course");
courseselect.innerHTML="<option value=''>select current course</option>";
if (!dept) return;
let courses=[];

if (dept.value==="IT"){
courses=["Java", "Python", "React"];
}else if (dept.value==="Business"){
courses=["Businness101","Critical Thinking","Entrepreneurship"];
}else if(dept.value==="CSE"){
courses=["C Programming","Data Structure","Algorithm"];
}else if(dept.value==="ECE"){
courses=["Digital Electroinc","VLSI Design","Embedded Systems"];
}else if(dept.value==="CIVIL"){
courses=["Structural Engineering","Surveying","Construction"];
}else if (dept.value==="MECH"){
courses=["Themodynamics","Autmobile","Manufacturing"];
}

courses.forEach(course=>{
let opt=document.createElement("option");
opt.value=course;
opt.text=course;
courseselect.appendChild(opt);
});
}
</script>

<body>
<div class="container">
<h2>Student Registration System</h2>
<form method="post" action="register.php">
<label>Student Name</label>
<input type="text" name="student_name" required>

<label>Gender</label>
<div class="gender">
<input type="radio" name="gender" value="male" required>Male
<input type="radio" name="gender" value="female" required>Female
</div>

<label>Email</label>
<input type="email" name="email" required>

<label>Phone</label>
<input type="text" name="phone" required>

<label>Date of Birth</label>
<input type="date" name="dob" required>

<label>Password</label>
<input type="password" name="password" required>

<label>Department</label>
<div class="dept">
<input type="radio" name="department" value="IT" onclick="updatecourses()"required>IT
<input type="radio" name="department" value="Business" onclick="updatecourses()"required>BUSINESS
<input type="radio" name="department" value="CSE" onclick="updatecourses()"required>CSE
<input type="radio" name="department" value="ECE" onclick="updatecourses()"required>ECE
<input type="radio" name="department" value="CIVIL" onclick="updatecourses()"required>CIVIL
<input type="radio" name="department" value="MECH" onclick="updatecourses()"required>MECH
</div>
    
<label>Course</label>
<select name="course" id="course" required>
<option value="">select current course</option>
</select>
    
<label>Address</label>
<textarea name="address" rows="3" required></textarea>
    
<button type="submit">Register</button>
</form>
</body>
</html>

    
