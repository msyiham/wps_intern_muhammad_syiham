<div class="logo-container">
    <img src="{{ URL::to('/') }}/src/img/logo.png" alt="Logo" class="logo-img" />
  </div>
  
  
<style>
    .logo-container {
      width: 100%;
      max-width: 360px; 
      margin: 0 auto;
    }
  
    .logo-img {
      width: 100%;
      height: auto; 
      display: block;
    }
  
    @media (max-width: 480px) {
      .logo-container {
        max-width: 300px;
      }
    }
  
    @media (min-width: 481px) and (max-width: 768px) {
      .logo-container {
        max-width: 340px;
      }
    }
  
    @media (min-width: 769px) {
      .logo-container {
        max-width: 360px;
      }
    }
</style>
  