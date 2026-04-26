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
        });
    </script>
