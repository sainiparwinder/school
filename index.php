<?php
require_once 'header.php';
?>
<html>
<head>
    <title>ajax</title>

</head>
<body>

<div class="container">

    <h2>NEW STUDENT</h2>
    <form action="javascript:void(0);" id="studentForm" method="">
        <div class="form-group" id="editform">
            <label for="firstname">Name:</label>
            <input type="text" class="form-control" id="firstname" placeholder="Enter name" name="firstname">
            <label for="fathername">Father Name:</label>
            <input type="text" class="form-control" id="fathername" placeholder="Enter Father Name" name="father_name">
            <label for="rollno">Rollno:</label>
            <input type="number" class="form-control" id="rollno" placeholder="Enter Rollno" name="rollno">
            <label for="trade">Class:</label>
            <input type="text" class="form-control" id="trade" placeholder="Enter Class" name="trade">

            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
            <button type="submit" class="btn btn-success" id='submit' onclick="addrecord()">Submit</button>
        </div>
    </form>
    <div id="records_content"></div>
</div>

<script type="text/javascript">
    $(document).ready(function () {			//load data when form is loaded
        readRecords();
    });

    function editRecord(id) {
        $.ajax({
            url: "studentdata.php",
            type: "POST",
            data: {id: id, action: 'edit'},
            success: function (data) {
                var x = data;
                document.getElementById('editform').innerHTML = x;

            }
        });
    }

    function updateRecord(id) {
        var firstname = $('#firstname').val();
        var fathername = $('#fathername').val();
        var trade = $('#trade').val();
        var rollno = $('#rollno').val();
        var email = $('#email').val();
        $.ajax({
            url: "studentdata.php",
            type: "POST",
            data: {
                firstname: firstname,
                fathername: fathername,
                trade: trade,
                rollno: rollno,
                email: email,
                id: id,
                action: 'update'
            },
            success: function (data) {
                readRecords();
            }
        });
    }

    function deleteRecord(id) {
        $.ajax({
            url: "studentdata.php",
            type: "POST",
            data: {id: id, action: 'delete'},
            success: function (data) {
                readRecords();
            }
        });
    }

    function readRecords() {
        $.ajax({
            url: "studentdata.php",
            type: "POST",
            data: { action: 'read'},
            success: function (data, status) {
                $('#records_content').html(data);
            }
        });
    }

    function addRecord() {
        var firstname = $('#firstname').val();
        var fathername = $('#fathername').val();
        var trade = $('#trade').val();
        var rollno = $('#rollno').val();
        var email = $('#email').val();
        $.ajax({
            url: "studentdata.php",
            type: "POST",
            data: {
                firstname: firstname,
                fathername: fathername,
                trade: trade,
                rollno: rollno,
                email: email,
                action: 'insert'
            },
            success: function (data) {
                readRecords();
            }
        })
    }
</script>
</body>
</html>

