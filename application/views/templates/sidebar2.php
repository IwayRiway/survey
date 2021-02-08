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

       <li class="<?=$side=='dashboard2'?'active':''?>"><a class="nav-link" href="<?=base_url('dashboard2')?>"><i class="fas fa-columns"></i><span>Dashboard</span></a></li> 

       <li class="<?=$side=='surveyshp'?'active':''?>"><a class="nav-link" href="<?=base_url('surveyshp')?>"><i class="fas fa-poll-h"></i><span>Survey</span></a></li>

      
   </aside>
 </div>

 <div class="info" data-flashdata="<?= $this->session->flashdata('info')?>"></div>
<div class="gagal" data-flashdata="<?= $this->session->flashdata('gagal')?>"></div>
<div class="sukses" data-flashdata="<?= $this->session->flashdata('sukses')?>"></div>
<div class="warning" data-flashdata="<?= $this->session->flashdata('warning')?>"></div>