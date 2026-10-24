<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dashboard </title>
    <script src="../Style/assets/js/chart.min.js"></script>

    
</head>

<body style="background-color: #e6dfdf;">
    <div class="container-fluid">
            <script>
                window.addEventListener("load", function() {
                    const preloader = document.querySelector("#preloader");
                    preloader.classList.add("hide");
                });
            </script>
            <div id="preloader">
                <div id="loader"></div>
            </div>
            <div class="">
                <div class="table-responsive">

                    <canvas id="myChart" width="100%" height="40%"></canvas>
                    <script>
                        var data = <?php echo json_encode($data); ?>;
                        var options = {
                            responsive: true,
                            title: {
                                display: false,
                                text: 'xxxx'
                            },
                            tooltips: {
                                mode: 'index',
                                intersect: false
                            },
                            hover: {
                                mode: 'nearest',
                                intersect: true
                            },
                            scales: {
                                xAxes: [{
                                    stacked: true,
                                    ticks: {
                                        beginAtZero: true
                                    },
                                    scaleLabel: {
                                        display: true,
                                        labelString: 'Nom de Client'
                                    }
                                }],
                                yAxes: [{
                                    stacked: true,
                                    ticks: {
                                        beginAtZero: true
                                    },
                                    scaleLabel: {
                                        display: true,
                                        labelString: 'Nombre de Voiture'
                                    }
                                }]
                            }
                        };
                        var ctx = document.getElementById('myChart').getContext('2d');
                        var myChart = new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: data.map(function(d) {
                                    return d.Nom;
                                }),
                                datasets: [{
                                    label: 'Nombre de Voiture Par Client',
                                    data: data.map(function(d) {
                                        return d.nbVoiture;
                                    }),
                                    backgroundColor: 'rgba(54, 162, 235, 0.5)',
                                    borderColor: 'rgba(54, 162, 235, 1)',
                                    borderWidth: 1,
                                    type: 'bar',
                                    fill: false
                                }]
                            },
                            options: options
                        });
                    </script>
                </div>

            </div>
        </div>
    </div>
</body>

</html>