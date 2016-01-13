<?php 
    session_start();
    if (isset($_POST['save_data'])) {
       $_SESSION['answers'] = $_POST['leftz'];
    }
?>

<!DOCTYPE HTML>
<html>
<head>
    <script type="text/javascript" src="../../js/jquery-1.11.3.js"></script>
<style type="text/css">
    SELECT, INPUT[type="text"] {
        width: 160px;
        box-sizing: border-box;
    }
    SECTION {
        padding: 8px;
        background-color: #f0f0f0;
        overflow: auto;
    }
    SECTION > DIV {
        float: left;
        padding: 4px;
    }
    SECTION > DIV + DIV {
        width: 40px;
        text-align: center;
    }
</style>

</head>

<body>
<form method="POST">
<section class="container">
    <div>
        <select name="leftz[]" id="leftValues" size="5" multiple></select>
    </div>
    <div>
        <input type="button" id="btnLeft" value="&lt;&lt;" />
        <input type="button" id="btnRight" value="&gt;&gt;" />
    </div>
    <div>
        <select id="rightValues" size="5" multiple>
            <option>1</option>
            <option>2</option>
            <option>3</option>
        </select>
    </div>
</section>
    <input type="submit" name="save_data" value="Save Data" />
</form>


<script>

$("#btnLeft").click(function () {
    var selectedItem = $("#rightValues option:selected");
    $("#leftValues").append(selectedItem);
});

$("#btnRight").click(function () {
    var selectedItem = $("#leftValues option:selected");
    $("#rightValues").append(selectedItem);
});

$("#rightValues").change(function () {
    var selectedItem = $("#rightValues option:selected");
});

</script>

</body>
</html>