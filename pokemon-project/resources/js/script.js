// PokeMarket JavaScript functionality

document.addEventListener('DOMContentLoaded', function() {
    
    // Navigation functionality
    const navButtons = document.querySelectorAll('.nav-btn');
    
    navButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Remove active class from all buttons
            navButtons.forEach(btn => btn.classList.remove('active'));
            
            // Add active class to clicked button (except download)
            if (!this.classList.contains('download')) {
                this.classList.add('active');
            }
            
            // Handle navigation
            const buttonText = this.textContent;
            
            switch(buttonText) {
                case 'Accueil':
                    console.log('Navigating to Home');
                    break;
                case 'Services':
                    console.log('Navigating to Services');
                    showServicesModal();
                    break;
                case 'Download':
                    console.log('Starting download');
                    handleDownload();
                    break;
            }
        });
    });
    
    // Phone hover animations
    const phones = document.querySelectorAll('.phone');
    
    phones.forEach(phone => {
        phone.addEventListener('mouseenter', function() {
            this.style.transform = 'rotate(0deg) scale(1.05)';
            this.style.zIndex = '10';
        });
        
        phone.addEventListener('mouseleave', function() {
            if (this.classList.contains('phone-right')) {
                this.style.transform = 'rotate(5deg) scale(1)';
            } else if (this.classList.contains('phone-bottom')) {
                this.style.transform = 'rotate(-10deg) scale(1)';
            } else {
                this.style.transform = 'rotate(-5deg) scale(1)';
            }
            this.style.zIndex = '1';
        });
    });
    
    // Charizard animation
    const charizard = document.querySelector('.charizard');
    
    if (charizard) {
        charizard.addEventListener('mouseenter', function() {
            this.style.transform = 'scale(1.1) rotate(5deg)';
            this.style.transition = 'all 0.3s ease';
        });
        
        charizard.addEventListener('mouseleave', function() {
            this.style.transform = 'scale(1) rotate(0deg)';
        });
    }
    
    // Form interactions
    const formInputs = document.querySelectorAll('.form-group input, .form-group select');
    
    formInputs.forEach(input => {
        input.addEventListener('focus', function() {
            this.style.borderColor = '#d85a5a';
            this.style.boxShadow = '0 0 5px rgba(216, 90, 90, 0.3)';
        });
        
        input.addEventListener('blur', function() {
            this.style.borderColor = '#ddd';
            this.style.boxShadow = 'none';
        });
    });
    
    // Transaction items interaction
    const transactionItems = document.querySelectorAll('.transaction-item');
    
    transactionItems.forEach(item => {
        item.addEventListener('click', function() {
            this.style.transform = 'scale(0.98)';
            setTimeout(() => {
                this.style.transform = 'scale(1)';
                showTransactionDetails(this);
            }, 150);
        });
    });
    
    // Profile action buttons
    const disconnectBtn = document.querySelector('.disconnect-btn');
    const deleteAccountBtn = document.querySelector('.delete-account-btn');
    
    if (disconnectBtn) {
        disconnectBtn.addEventListener('click', function() {
            if (confirm('Êtes-vous sûr de vouloir vous déconnecter?')) {
                console.log('User disconnected');
                showNotification('Déconnexion réussie!', 'success');
            }
        });
    }
    
    if (deleteAccountBtn) {
        deleteAccountBtn.addEventListener('click', function() {
            if (confirm('Êtes-vous sûr de vouloir supprimer votre compte? Cette action est irréversible.')) {
                console.log('Account deletion requested');
                showNotification('Demande de suppression envoyée.', 'warning');
            }
        });
    }
    
    // Card price animation
    const priceBadge = document.querySelector('.price-badge');
    
    if (priceBadge) {
        setInterval(() => {
            priceBadge.style.transform = 'scale(1.1)';
            setTimeout(() => {
                priceBadge.style.transform = 'scale(1)';
            }, 200);
        }, 3000);
    }
    
    // Rating section interaction
    const evaluationsBtn = document.querySelector('.evaluations-btn');
    
    if (evaluationsBtn) {
        evaluationsBtn.addEventListener('click', function() {
            showEvaluationsModal();
        });
    }
    
    // Smooth scrolling for internal links
   document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

});

            