    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Reveal animation observer
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('active');
                        entry.target.style.transform = ''; // Clear inline transform
                        
                        // Trigger chart animation if it's the stats section
                        if (entry.target.id === 'stats') {
                            initCharts();
                        }
                    } else {
                        entry.target.classList.remove('active');
                        
                        // Set entrance direction based on exit position
                        const rect = entry.target.getBoundingClientRect();
                        if (rect.top < 0) {
                            entry.target.style.transform = 'translateY(-40px)';
                        } else {
                            entry.target.style.transform = 'translateY(40px)';
                        }
                    }
                });
            }, observerOptions);

            document.querySelectorAll('.reveal').forEach(el => observer.observe(el));

            // Navbar active state observer
            const navLinks = document.querySelectorAll('.nav-link');
            const sections = document.querySelectorAll('section[id], footer[id]');

            const navObserverOptions = {
                threshold: 0,
                rootMargin: "-10% 0px -80% 0px"
            };

            const setActiveLink = (id) => {
                navLinks.forEach(link => {
                    const isActive = link.getAttribute('href') === '#' + id;
                    link.classList.toggle('text-brick', isActive);
                    link.classList.toggle('border-brick', isActive);
                    link.classList.toggle('border-transparent', !isActive);
                });
            };

            const navObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        setActiveLink(entry.target.id);
                    }
                });
            }, navObserverOptions);

            sections.forEach(section => navObserver.observe(section));

            navLinks.forEach(link => {
                link.addEventListener('click', (e) => {
                    const id = link.getAttribute('href').substring(1);
                    setActiveLink(id);
                });
            });

            // Chart initialization logic
            let chartsInitialized = false;
            const initCharts = () => {
                if (chartsInitialized) return;
                chartsInitialized = true;

                const brickColor = '#B85C38'; // Matches the theme brick color
                const coffee700 = '#6F370F';

                // Delay animation configuration
                const delayedAnimation = {
                    delay: (context) => {
                        let delay = 0;
                        if (context.type === 'data' && context.mode === 'default') {
                            delay = context.dataIndex * 150 + context.datasetIndex * 100;
                        }
                        return delay;
                    },
                };

                // Bar Chart
                new Chart(document.getElementById('barChart'), {
                    type: 'bar',
                    data: {
                        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                        datasets: [{
                            label: 'Cups Served',
                            data: [1200, 1900, 1500, 2100, 2400, 2800],
                            backgroundColor: brickColor,
                            borderRadius: 10,
                        }]
                    },
                    options: {
                        animation: delayedAnimation,
                        maintainAspectRatio: false,
                        plugins: { legend: { display: false } },
                        scales: {
                            y: { grid: { color: 'rgba(255,255,255,0.1)' }, ticks: { color: '#fff' } },
                            x: { grid: { display: false }, ticks: { color: '#fff' } }
                        }
                    }
                });

                // Point Style (Line) Chart
                new Chart(document.getElementById('pointChart'), {
                    type: 'line',
                    data: {
                        labels: ['2021', '2022', '2023', '2024', '2025', '2026'],
                        datasets: [{
                            label: 'Retention Rate',
                            data: [65, 72, 78, 85, 88, 94],
                            borderColor: brickColor,
                            backgroundColor: 'rgba(184, 92, 56, 0.2)',
                            fill: true,
                            pointStyle: 'rectRot',
                            pointRadius: 8,
                            pointHoverRadius: 12,
                            tension: 0.4
                        }]
                    },
                    options: {
                        animation: delayedAnimation,
                        maintainAspectRatio: false,
                        plugins: { legend: { display: false } },
                        scales: {
                            y: { grid: { color: 'rgba(255,255,255,0.1)' }, ticks: { color: '#fff' } },
                            x: { grid: { display: false }, ticks: { color: '#fff' } }
                        }
                    }
                });

                // Doughnut Chart
                new Chart(document.getElementById('doughnutChart'), {
                    type: 'doughnut',
                    data: {
                        labels: ['Africa', 'South America', 'Asia', 'Central America'],
                        datasets: [{
                            data: [35, 45, 10, 10],
                            backgroundColor: [brickColor, coffee700, '#A68A64', '#582F0E'],
                            borderWidth: 0,
                            hoverOffset: 20
                        }]
                    },
                    options: {
                        animation: {
                            animateRotate: true,
                            animateScale: true,
                            duration: 2000,
                            easing: 'easeOutQuart'
                        },
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                position: 'bottom',
                                labels: { color: '#fff', padding: 20, font: { size: 12 } }
                            }
                        },
                        cutout: '70%'
                    }
                });
            };
        });
    </script>
