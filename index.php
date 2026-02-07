<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <title>PATRIKA</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }
        
        body {
            background: #f4f6f8;
        }
        /* ===== TOP BAR ===== */
        
        .topbar {
            background: #1a73e8;
            color: #fff;
            padding: 15px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        
        
        /* ===== SIDEBAR (MOBILE) ===== */
        
       
                                          
        .hamburger {
            background: transparent;
                                              display: none;
                                              color: white;
                                              align-items: center;
                                              justify-content: center;
                                              width: 27px;
                                              height: 40px;
                                              font-size: 22px;
                                              border-radius: 10px;
                                              cursor: pointer;
                                              transition: transform .1s ease, box-shadow .15s ease;
                                          }
                                          
                                          .hamburger:active {
                                              transform: scale(0.98);
                                          }
                                          
                                          .nav-buttons {
                                              display: flex;
                                              gap: 10px;
                                              flex-wrap: wrap;
                                              margin-left: auto;
                                              margin-right: 12px;
                                          }
                                          
                                          .nav-buttons a {
                                              flex: 1;
                                              min-width: 90px;
                                              padding: 8px 14px;
                                              text-align: center;
                                              text-decoration: none;
                                              border-radius: 12px;
                                              font-size: 14px;
                                              font-weight: 600;
                                              color: white;
                                              transition: all .25s ease;
                                          }
                                          
                                          .nav-buttons a:hover {
                                              background: #8b5cf6;
                                              color: #fff;
                                              border-color: #8b5cf6;
                                              transform: translateY(-3px);
                                              box-shadow: 0 4px 10px rgba(0, 0, 0, .15);
                                          }
                                          /* Sidebar base (hidden by default) */
                                          
                                          .sidebar {
                                              position: fixed;
                                              inset: 0;
                                              z-index: 40;
                                              display: none;
                                              /* hidden by default */
                                          }
                                          
                                          .sidebar.open {
                                              display: block;
                                          }
                                          
                                          .sidebar-backdrop {
                                              position: absolute;
                                              inset: 0;
                                              background: rgba(0, 0, 0, .45);
                                          }
                                          
                                          .sidebar-panel {
                                              position: absolute;
                                              top: 0;
                                              bottom: 0;
                                              left: 0;
                                              width: min(60%, 200px);
                                              background: #fff;
                                              border-right: 1px solid #e5e7eb;
                                              transform: translateX(-100%);
                                              transition: transform .25s ease;
                                              display: flex;
                                              flex-direction: column;
                                          }
                                          
                                          .sidebar.open .sidebar-panel {
                                              transform: translateX(0);
                                          }
                                          
                                          .sidebar-head {
                                              display: flex;
                                              align-items: center;
                                              justify-content: space-between;
                                              padding: 14px 16px;
                                              border-bottom: 1px solid #e5e7eb;
                                              font-weight: 700;
                                          }
                                          
                                          .sidebar-close {
                                              width: 36px;
                                              height: 36px;
                                              border: none;
                                              border-radius: 10px;
                                              background: #f3f4f6;
                                              font-size: 22px;
                                              cursor: pointer;
                                          }
                                          
                                          .sidebar-links {
                                              display: grid;
                                              gap: 8px;
                                              padding: 12px;
                                          }
                                          
                                          .sidebar-links a {
                                              display: block;
                                              padding: 10px 12px;
                                              border: 1px solid #e5e7eb;
                                              border-radius: 12px;
                                              text-decoration: none;
                                              color: #333;
                                              font-weight: 600;
                                              transition: background .2s ease, color .2s ease, transform .1s ease;
                                          }
                                          
                                          .sidebar-links a:hover {
                                              background: #f5f3ff;
                                              color: #4c1d95;
                                              transform: translateY(-1px);
                                          }
        /* ===== CONTENT ===== */
        
        .content {
            padding: 30px;
        }
        /* ===== LOGIN POPUP ===== */
        
        .overlay {
            position: fixed;
            top: 58px;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 2000;
            border:0px;
        }
        
        .close {
            position: absolute;
            right: 12px;
            top: 10px;
            cursor: pointer;
        }
        /* ===== RESPONSIVE ===== */
        
        @media(max-width:768px) {
            .hamburger {
                display: block;
            }
            .nav-buttons {
                display: none;
            }
            .overlay{
                top:62px;
            }
        }
        
       
            @media (max-width: 769px) {
                                              .hamburger {
                                                  display: inline-flex;
                                              }
                                              .nav-buttons {
                                                  display: none;
                                              }
            
        }
        #name{
            font-size: 25px;
            text-decoration: none;
            color:white ;
            font-weight: bold;
        }

        .hero {
    padding: 60px;
    background: linear-gradient(135deg,#4f46e5,#06b6d4);
    color: white;
    border-radius: 16px;
}
.card-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit,minmax(250px,1fr));
    gap: 20px;
}

.card {
    background: white;
    padding: 20px;
    border-radius: 14px;
}


    </style>
 

</head>

<body>

    <!-- TOP BAR -->
    <div class="topbar">
        <span class="hamburger" id="hamburger" aria-label="Open menu">☰</span>
        <a id="name" href="index.php">PATRIKA</a>
        <div class="nav-buttons">
            <a href="index.php">Home</a>
            <a href="#" onclick="showPage('About')">About</a>
            <a href="#" onclick="showPage('Services')">Services</a>
            <?php if(!isset($_SESSION['user'])){ ?>
        <a  onclick="openLogin()">Login</a>
    <?php } else { ?>
        <a href="#" onclick="toggleAccount()">Account</a>
        <a href="user_logout.php">Logout</a>
       <script>closeLogin();</script>
    <?php } ?>

        </div>
    </div>

    <!-- SIDEBAR (MOBILE) -->
    <aside class="sidebar" id="sidebar">
        <div class="sidebar-backdrop" id="sidebarBackdrop"></div>
        <div class="sidebar-panel">
            <div class="sidebar-head">
                <span>Menu</span>
                <button class="sidebar-close" id="sidebarClose">×</button>
            </div>
            <nav class="sidebar-links">
        <a href="#" onclick=" openLogin(); ">Login</a>
        <a href="index.php" >Home</a>
        <a href="#" onclick="closeMenu();showPage('About')">About</a>
        <a href="#" onclick="closeMenu();showPage('Services')">Services</a>
        </nav>
        </div>
    </aside>
    <?php if(isset($_SESSION['user'])){ ?>
<div id="accountBox" style="
display:none;
position:fixed;
top:80px;
right:20px;
background:white;
padding:20px;
border-radius:12px;
box-shadow:0 10px 25px rgba(0,0,0,.2);
z-index:3000;
min-width:250px
">
    <h3>My Account</h3>
    <p><b>Email:</b> <?= htmlspecialchars($_SESSION['user']) ?></p>
    <p><b>Password:</b> ********</p>
</div>
<?php } ?>

    </body>
    <!-- data-->
    <section class="hero">
    <h1>Welcome to Our Website</h1>
    <p>Simple, fast and responsive web platform.</p>
    <button>Get Started</button>
    </section>
<div class="card-grid">
    <div class="card">Content 1</div>
    <div class="card">Content 2</div>
    <div class="card">Content 3</div>
</div>

<!-- LOGIN POPUP -->
<div>
    
<iframe class="overlay" id="loginPopup"></iframe>

    
</div>
    <script>
        
 // ====== Sidebar (guarded) ======
(function () {
  const sidebar = document.getElementById('sidebar');
  const openBtn = document.getElementById('hamburger');
  const closeBtn = document.getElementById('sidebarClose');
  const backdrop = document.getElementById('sidebarBackdrop');
  if (!sidebar) return;
  function openSidebar() {
    sidebar.classList.add('open');
    openBtn && openBtn.setAttribute('aria-expanded', 'true');
    sidebar.setAttribute('aria-hidden', 'false');
    document.body.style.overflow = 'hidden';
  }
  function closeSidebar() {
    sidebar.classList.remove('open');
    openBtn && openBtn.setAttribute('aria-expanded', 'false');
    sidebar.setAttribute('aria-hidden', 'true');
    document.body.style.overflow = '';
  }
  openBtn && openBtn.addEventListener('click', openSidebar);
  closeBtn && closeBtn.addEventListener('click', closeSidebar);
  backdrop && backdrop.addEventListener('click', closeSidebar);
  // Close on link click
  sidebar.querySelectorAll('a').forEach(a => a.addEventListener('click', closeSidebar));
  // Close on Escape
  window.addEventListener('keydown', (e) => { if (e.key === 'Escape') closeSidebar(); });
})();

        function openLogin() {
            const iframe = document.getElementById("loginPopup");
    iframe.style.display = "flex";
    iframe.src = "index1.php";
        }
        function closeLogin() {
            const iframe = document.getElementById("loginPopup");
    iframe.style.display = "none";
    iframe.src = "";
    present.closelogin();
}
    function toggleAccount(){
    const box = document.getElementById("accountBox");
    if(!box) return;
    box.style.display = box.style.display === "block" ? "none" : "block";
}


    </script>

</body>

</html>