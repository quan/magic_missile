<html>

<head>
</head>

<body>

<script>
	var myObject = new Object();
	myObject.name = "Nick";
	myObject.age = 24;
	myObject.pets = ["rabbit", "dog"];

	var myString = JSON.stringify(myObject);

	alert(myString);
</script>
</body>

</html>