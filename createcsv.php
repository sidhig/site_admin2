<?
include_once('connect.php');
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=data.csv');

// create a file pointer connected to the output stream
$output = fopen('php://output', 'w');

// output the column headings
fputcsv($output, array('id', 'company name', 'contact person','Tread','phone_no','email_add'));

// fetch the data
$sql="SELECT id, company_name, contact_person, Tread, phone_no, email_add FROM tbl_employer";
$rows = mysqli_query($conn,$sql);

// loop over the rows, outputting them
while ($row = mysqli_fetch_assoc($rows)) fputcsv($output, $row);
?>
<a id="csv_link" href="">
                                <input type="button" style=" width: auto;  min-width: 25%;  font-weight: 700;  height: 40px; cursor:pointer; background: url('image/3_d_button.png'); background-size: 100% 100%; border:0px;" onclick="exc_download()"
                                value="Download CSV" />
                            </a>
<?php
    $cr = "\n";
    $csvdata = "First Name" . ',' . "Last Name"  . $cr;
    $csvdata .= $txtFName . ',' . $txtLName . $cr;

    $thisfile = 'file.csv';

    $encoded = chunk_split(base64_encode($csvdata));

    // create the email and send it off

    $subject = "File you requested from RRWH.com";
    $from = "scripts@rrwh.com";
    $headers = 'MIME-Version: 1.0' . "\n";
    $headers .= 'Content-Type: multipart/mixed;
        boundary="----=_NextPart_001_0011_1234ABCD.4321FDAC"' . "\n";

    $message = '

    This is a multi-part message in MIME format.

    ------=_NextPart_001_0011_1234ABCD.4321FDAC
    Content-Type: text/plain;
            charset="us-ascii"
    Content-Transfer-Encoding: 7bit

    Hello

    We have attached for you the PHP script that you requested from http://rrwh.com/scripts.php
    as a zip file.

    Regards

    ------=_NextPart_001_0011_1234ABCD.4321FDAC
    Content-Type: application/octet-stream;  name="';

    $message .= "$thisfile";
    $message .= '"
    Content-Transfer-Encoding: base64
     Content-Disposition: attachment; filename="';
    $message .= "$thisfile";
    $message .= '"

    ';
    $message .= "$encoded";
    $message .= '

    ------=_NextPart_001_0011_1234ABCD.4321FDAC--

    ';

    // now send the email
    mail($email, $subject, $message, $headers, "-f$from");
   ?>
   <script>
    function exc() {
                    //alert($("#csv_string").val());
                    $.post("create_csv.php", {
                        csv_string: $("#csv_string").val()
                    }, function(data) {
                        filename = data;
                        var email = prompt("Send CSV to Email");
                        if (email != '' & email != null) {
                            $.post("create_csv.php", {
                                email: email,
                                csv_string: $("#csv_string").val(),
                                create_for: 'Crew Change'
                            }, function(data) { alert(data);
                                alert("Email send successfully to " + email);
                            });
                        } else {
                            return false;
                        }
                    });
                }</script>