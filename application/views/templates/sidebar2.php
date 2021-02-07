<?php $side=$this->uri->segment(1);?>
<div class="main-sidebar sidebar-style-2">
   <aside id="sidebar-wrapper">
     <div class="sidebar-brand">
       <a href="index.html">Survey</a>
     </div>
     <div class="sidebar-brand sidebar-brand-sm">
       <a href="index.html">Survey</a>
     </div>
     <ul class="sidebar-menu">
       <li class="menu-header">Navigation</li>

       <!-- <li class="<?=$side=='dashboard'?'active':''?>"><a class="nav-link" href="<?=base_url('dashboard')?>"><i class="fas fa-columns"></i><span>Dashboard</span></a></li> 

       <li class="<?=$side=='kategori'?'active':''?>"><a class="nav-link" href="<?=base_url('kategori')?>"><i class="fas fa-address-card"></i><span>Data Kategori Kuesioner</span></a></li> 

       <li class="<?=$side=='kuesioner'?'active':''?>"><a class="nav-link" href="<?=base_url('kuesioner')?>"><i class="fas fa-user-tie"></i><span>Data Kuesioner</span></a></li> 

       <li class="<?=$side=='region'?'active':''?>"><a class="nav-link" href="<?=base_url('region')?>"><i class="fas fa-book"></i><span>Data Region</span></a></li> 

       <li class="<?=$side=='store'?'active':''?>"><a class="nav-link" href="<?=base_url('store')?>"><i class="fas fa-book"></i><span>Data Store</span></a></li> 

       <li class="<?=$side=='supervisor'?'active':''?>"><a class="nav-link" href="<?=base_url('supervisor')?>"><i class="fas fa-folder"></i><span>Data Supervisor</span></a></li> 

       <li class="<?=$side=='setting'?'active':''?>"><a class="nav-link" href="<?=base_url('setting')?>"><i class="fas fa-sign-out-alt"></i><span>Setting</span></a></li>  -->

       <!-- <li class="<?=$side=='lembur'?'active':''?>"><a class="nav-link" href="<?=base_url('lembur')?>"><i class="fas fa-user-clock"></i><span>Data Lembur</span></a></li> 

       <li class="<?=$side=='pengajuan'?'active':''?>"><a class="nav-link" href="<?=base_url('pengajuan')?>"><i class="fas fa-user-plus"></i><span>Pengajuan Karyawan</span></a></li> 

       <li class="<?=$side=='menu'?'active':''?>"><a class="nav-link" href="<?=base_url('menu')?>"><i class="fas fa-cogs"></i><span>Manajemen Menu</span></a></li>  -->

      
   </aside>
 </div>

 <div class="info" data-flashdata="<?= $this->session->flashdata('info')?>"></div>
<div class="gagal" data-flashdata="<?= $this->session->flashdata('gagal')?>"></div>
<div class="sukses" data-flashdata="<?= $this->session->flashdata('sukses')?>"></div>
<div class="warning" data-flashdata="<?= $this->session->flashdata('warning')?>"></div>