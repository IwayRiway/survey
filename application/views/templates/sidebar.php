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

       <li class="<?=$side=='department'?'active':''?>"><a class="nav-link" href="<?=base_url('department')?>"><i class="fas fa-folder"></i><span>Data Department</span></a></li> 

       <li class="<?=$side=='jabatan'?'active':''?>"><a class="nav-link" href="<?=base_url('jabatan')?>"><i class="fas fa-address-card"></i><span>Data Jabatan</span></a></li> 

       <li class="<?=$side=='karyawan'?'active':''?>"><a class="nav-link" href="<?=base_url('karyawan')?>"><i class="fas fa-user-tie"></i><span>Data Karyawan</span></a></li> 

       <li class="<?=$side=='sop'?'active':''?>"><a class="nav-link" href="<?=base_url('sop')?>"><i class="fas fa-book"></i><span>Data SOP</span></a></li> 

       <li class="<?=$side=='cuti'?'active':''?>"><a class="nav-link" href="<?=base_url('cuti')?>"><i class="fas fa-sign-out-alt"></i><span>Data Cuti</span></a></li> 

       <li class="<?=$side=='lembur'?'active':''?>"><a class="nav-link" href="<?=base_url('lembur')?>"><i class="fas fa-user-clock"></i><span>Data Lembur</span></a></li> 

       <li class="<?=$side=='pengajuan'?'active':''?>"><a class="nav-link" href="<?=base_url('pengajuan')?>"><i class="fas fa-user-plus"></i><span>Pengajuan Karyawan</span></a></li> 

       <li class="<?=$side=='menu'?'active':''?>"><a class="nav-link" href="<?=base_url('menu')?>"><i class="fas fa-cogs"></i><span>Manajemen Menu</span></a></li>  -->

      
   </aside>
 </div>

 <div class="info" data-flashdata="<?= $this->session->flashdata('info')?>"></div>
<div class="gagal" data-flashdata="<?= $this->session->flashdata('gagal')?>"></div>
<div class="sukses" data-flashdata="<?= $this->session->flashdata('sukses')?>"></div>
<div class="warning" data-flashdata="<?= $this->session->flashdata('warning')?>"></div>