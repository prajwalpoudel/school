<?php

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

Breadcrumbs::register('admin.index' , function ($breadcrumb) {
    $breadcrumb->push('Home', route('menu'), ['icon' => 'm-nav__link-icon la la-home']);
});

Breadcrumbs::register('admin.dashboard' , function ($breadcrumb) {
    $breadcrumb->parent('admin.index');
    $breadcrumb->push('Dashboard');
});

Breadcrumbs::register('admin.dashboard.create' , function ($breadcrumb) {
    $breadcrumb->parent('admin.dashboard');
    $breadcrumb->push('Create');
});

// Student Breadcrumbs
Breadcrumbs::register('admin.student.index' , function ($breadcrumb) {
    $breadcrumb->parent('admin.index');
    $breadcrumb->push('Student', route('admin.student.index'));
});

Breadcrumbs::register('admin.student.create' , function ($breadcrumb) {
    $breadcrumb->parent('admin.student.index');
    $breadcrumb->push('Create', route('admin.student.create'));
});

Breadcrumbs::register('admin.student.edit' , function ($breadcrumb) {
    $breadcrumb->parent('admin.student.index');
    $breadcrumb->push('Edit', route('admin.student.create'));
});

// Grade Breadcrumbs

Breadcrumbs::register('admin.grade.index' , function ($breadcrumb) {
    $breadcrumb->parent('admin.index');
    $breadcrumb->push('Grade', route('admin.grade.index'));
});

Breadcrumbs::register('admin.grade.create' , function ($breadcrumb) {
    $breadcrumb->parent('admin.grade.index');
    $breadcrumb->push('Create', route('admin.grade.create'));
});

// Section Breadcrumbs

Breadcrumbs::register('admin.section.index' , function ($breadcrumb) {
    $breadcrumb->parent('admin.index');
    $breadcrumb->push('Section', route('admin.section.index'));
});

Breadcrumbs::register('admin.section.create' , function ($breadcrumb) {
    $breadcrumb->parent('admin.section.index');
    $breadcrumb->push('Create', route('admin.section.create'));
});

// Email Template Breadcrumbs

Breadcrumbs::register('admin.email_template.index' , function ($breadcrumb) {
    $breadcrumb->parent('admin.index');
    $breadcrumb->push('Email Template', route('admin.email_template.index'));
});

Breadcrumbs::register('admin.email_template.create' , function ($breadcrumb) {
    $breadcrumb->parent('admin.email_template.index');
    $breadcrumb->push('Create', route('admin.email_template.create'));
});

// Discount Package

Breadcrumbs::register('admin.discount_package.index' , function ($breadcrumb) {
    $breadcrumb->parent('admin.index');
    $breadcrumb->push('Discount Package', route('admin.discount_package.index'));
});

Breadcrumbs::register('admin.discount_package.create' , function ($breadcrumb) {
    $breadcrumb->parent('admin.discount_package.index');
    $breadcrumb->push('Create', route('admin.discount_package.create'));
});

// Fees
Breadcrumbs::register('admin.fee.index' , function ($breadcrumb) {
    $breadcrumb->parent('admin.index');
    $breadcrumb->push('Fee', route('admin.fee.index'));
});

Breadcrumbs::register('admin.fee.create' , function ($breadcrumb) {
    $breadcrumb->parent('admin.fee.index');
    $breadcrumb->push('Create', route('admin.fee.create'));
});

// Fee Category
Breadcrumbs::register('admin.fee_category.index' , function ($breadcrumb) {
    $breadcrumb->parent('admin.index');
    $breadcrumb->push('Fee Category', route('admin.fee_category.index'));
});

Breadcrumbs::register('admin.fee_category.create' , function ($breadcrumb) {
    $breadcrumb->parent('admin.fee_category.index');
    $breadcrumb->push('Create', route('admin.fee_category.create'));
});

// Installments
Breadcrumbs::register('admin.installment.index' , function ($breadcrumb) {
    $breadcrumb->parent('admin.index');
    $breadcrumb->push('Installments', route('admin.installment.index'));
});

Breadcrumbs::register('admin.installment.create' , function ($breadcrumb) {
    $breadcrumb->parent('admin.installment.index');
    $breadcrumb->push('Create', route('admin.installment.create'));
});











//Student Breadcrumbs

Breadcrumbs::register('student.index' , function ($breadcrumb) {
    $breadcrumb->push('Home', route('student.index'), ['icon' => 'm-nav__link-icon la la-home']);
});

Breadcrumbs::register('student.dashboard' , function ($breadcrumb) {
    $breadcrumb->parent('student.index');
    $breadcrumb->push('Dashboard', route('student.index'));
});

Breadcrumbs::register('student.dashboard.create' , function ($breadcrumb) {
    $breadcrumb->parent('student.dashboard');
    $breadcrumb->push('Create', route('student.create'));
});




