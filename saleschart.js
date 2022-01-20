var ctx = document.getElementById('salesChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
        datasets: [{
            data: [25, 28, 33, 30, 29, 43, 48, 53, 56, 60, 55, 78],
            label: "Forecasted Sales",
            borderColor: "rgb(62,149,205)",
            backgroundColor: "rgb(62,149,205,0.1)",
        }, {
            data: [24, 32, 30, 30, 25, 22, 52, 56, 60, 54, 70, 75],
            label: "Actual Sales",
            borderColor: "rgb(60,186,159)",
            backgroundColor: "rgb(60,186,159,0.1)",
        }
      ]
    },
    options: {
        title: {
            display: true,
            text: "Yearly expected vs actual Sales"
        },
        responsive: true,
        maintainAspectRatio: false,
    }
});
