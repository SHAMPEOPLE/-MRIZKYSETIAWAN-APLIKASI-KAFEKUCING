<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">

  <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
          <img src="assets/img/logo.png" alt="Logo">
          <span class="d-none d-lg-block">NiceAdmin</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
  </div>

  <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
          <input type="text" name="query" placeholder="Search" title="Enter search keyword">
          <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
  </div>

  <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

          <li class="nav-item d-block d-lg-none">
              <a class="nav-link nav-icon search-bar-toggle" href="#"><i class="bi bi-search"></i></a>
          </li>

          <!-- Notification Dropdown -->
          <li class="nav-item dropdown">
              <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                  <i class="bi bi-bell"></i>
                  <span class="badge bg-primary badge-number">4</span>
              </a>
              <ul class="dropdown-menu dropdown-menu-end notifications">
                  <li class="dropdown-header">
                      You have 4 new notifications
                      <a href="#"><span class="badge bg-primary p-2">View all</span></a>
                  </li>
                  <li><hr class="dropdown-divider"></li>
                  <!-- Notification Items -->
                  <li class="notification-item"><i class="bi bi-exclamation-circle text-warning"></i>
                      <div>
                          <h4>Lorem Ipsum</h4>
                          <p>30 min. ago</p>
                      </div>
                  </li>
                  <li><hr class="dropdown-divider"></li>
                  <li class="notification-item"><i class="bi bi-x-circle text-danger"></i>
                      <div>
                          <h4>Atque rerum nesciunt</h4>
                          <p>1 hr. ago</p>
                      </div>
                  </li>
                  <!-- More notifications can be added here -->
                  <li><hr class="dropdown-divider"></li>
                  <li class="dropdown-footer">
                      <a href="#">Show all notifications</a>
                  </li>
              </ul>
          </li>

          <!-- Messages Dropdown -->
          <li class="nav-item dropdown">
              <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                  <i class="bi bi-chat-left-text"></i>
                  <span class="badge bg-success badge-number">3</span>
              </a>
              <ul class="dropdown-menu dropdown-menu-end messages">
                  <li class="dropdown-header">
                      You have 3 new messages
                      <a href="#"><span class="badge bg-primary p-2">View all</span></a>
                  </li>
                  <li><hr class="dropdown-divider"></li>
                  <!-- Message Items -->
                  <li class="message-item">
                      <a href="#">
                          <img src="/NiceAdmin/assets/img/messages-1.jpg" alt="Maria" class="rounded-circle">
                          <div>
                              <h4>Maria Hudson</h4>
                              <p>4 hrs. ago</p>
                          </div>
                      </a>
                  </li>
                  <li><hr class="dropdown-divider"></li>
                  <li class="dropdown-footer">
                      <a href="#">Show all messages</a>
                  </li>
              </ul>
          </li>

          <!-- Profile Dropdown -->
          <li class="nav-item dropdown pe-3">
              <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                  <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
                  <span class="d-none d-md-block dropdown-toggle ps-2">K. Anderson</span>
              </a>
              <ul class="dropdown-menu dropdown-menu-end profile">
                  <li class="dropdown-header">
                      <h6>Kevin Anderson</h6>
                      <span>Web Designer</span>
                  </li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="users-profile.html"><i class="bi bi-person"></i> My Profile</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="pages-faq.html"><i class="bi bi-question-circle"></i> Need Help?</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#"><i class="bi bi-box-arrow-right"></i> Sign Out</a></li>
              </ul>
          </li>

      </ul>
  </nav>

</header>
<!-- End Header -->
