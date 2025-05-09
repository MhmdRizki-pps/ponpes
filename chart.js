// Grafik Total Pendaftar (contoh data per tahun)
const ctxPendaftar = document.getElementById('grafikPendaftar').getContext('2d');
const grafikPendaftar = new Chart(ctxPendaftar, {
    type: 'bar',
    data: {
        labels: ['2021', '2022', '2023', '2024'], // Ganti sesuai data nyata
        datasets: [{
            label: 'Jumlah Pendaftar',
            data: [80, 120, 150, 200], // Ganti sesuai data nyata
            backgroundColor: 'rgba(75, 192, 192, 0.6)',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

// Grafik Jumlah Siswa IPA dan IPS (Pie chart)
const ctxKelas = document.getElementById('grafikKelas').getContext('2d');
const grafikKelas = new Chart(ctxKelas, {
    type: 'pie',
    data: {
        labels: ['IPA', 'IPS'],
        datasets: [{
            label: 'Jumlah Siswa',
            data: [90, 60], // Ganti sesuai data nyata
            backgroundColor: [
                'rgba(54, 162, 235, 0.7)',
                'rgba(255, 206, 86, 0.7)'
            ],
            borderColor: [
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        responsive: true
    }
});
