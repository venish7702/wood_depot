<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
    <link rel="website icon" type="png" href="./image/bus-pav.jpg">
    <style type="text/css">
        @media print {
            #downloadBtn {
                display: none;
            }
        }
    </style>
</head>

<body>


    <div class="container">
        <div class="container mt-5" id="receipt">
            <div class="row bg-black">
                <div class="col-md-12 ">
                    <div class="mx-auto">
                        <img src="./imgae/D Rose.png" alt="Logo" class="img-fluid" style="max-width:100px;">
                        <span style="font-size: 30px;margin-top:12rem;"><b style="padding: 17px 20px; ">WOOD DEPOT</b></span>
                    </div>
                    <p>
                    <h3 class="text-center">Payment Receipt</h3>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered table-striped">
                        <thead class="bg-dark text-white">
                            <tr>
                                <th>Title</th>
                                <th>Discription</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Payment Id</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Name</td>
                                <td></td>
                            </tr>

                            <tr>
                                <td>Email</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Payment Status</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Currency</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Qty</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Price</td>
                                <td> ₹</td>
                            </tr>

                        </tbody>

                    </table>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <p class="text-right"><strong>Total Price:</strong> ₹100000</p>
                </div>
                <div class="col-md-12">
                    <p class="text-center">Thank you for choosing our service!</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <p class="text-center"><img src="./imgae/D Rose.png" height="100px"></p>
                </div>
            </div>
        </div>
    </div>
    <!-- download button -->
    <div class="row mt-4 mb-4">
        <div class="col-md-12 text-center">
            <?php
            //   if ($status == 'success') {
            ?>
            <button id="downloadBtn" class="btn btn-success">Download Receipt</button>

            <?php
            //   }
            ?>
        </div>
    </div>

</body>
<script type="text/javascript">
    window.onload = function() {
        document.getElementById("downloadBtn").addEventListener("click", () => {
            const invoice = this.document.getElementById("receipt");
            console.log(invoice);
            console.log(window);
            var opt = {
                margin: 1,
                filename: 'invoice.pdf',
                image: {
                    type: 'jpeg',
                    quality: 0.98
                },
                html2canvas: {
                    scale: 2
                },
                jsPDF: {
                    unit: 'in',
                    format: 'letter',
                    orientation: 'portrait'
                }
            };
            html2pdf().from(invoice).set(opt).save();
        })
    }
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>

</html>