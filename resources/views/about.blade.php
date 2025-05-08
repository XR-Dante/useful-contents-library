@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <h1 class="text-3xl font-bold mb-4">About Us</h1>
        <p class="mb-4">
            Content Hub is a platform that gathers various digital content in one place. We allow users to view, share, and rate videos, books, music, and other multimedia content.
        </p>
        <p class="mb-4">
            This project is built using the Laravel framework and provides a modern, user-friendly interface for managing content. Each piece of content is categorized and associated with authors.
        </p>
        <p class="mb-4">
            Our goal is to deliver high-quality, reliable, and well-organized content to users. Admins can add, edit, or delete content as needed.
        </p>
        <p>
            If you have any questions or suggestions, feel free to <a href="/contact" class="text-blue-500 underline">contact us</a>.
        </p>
    </div>

    <div class="container py-5">
        <h1 class="text-3xl font-bold mb-4">Biz haqimizda</h1>
        <p class="mb-4">
            Content Hub — bu turli xil raqamli kontentlarni bir joyga jamlaydigan platforma. Biz foydalanuvchilarga videolar, kitoblar, musiqa va boshqa multimedia resurslarini ko‘rish, baham ko‘rish va baholash imkoniyatini beramiz.
        </p>
        <p class="mb-4">
            Loyiha Laravel freymvorkida yaratilgan bo‘lib, foydalanuvchilarga qulay va zamonaviy interfeys orqali kontentni boshqarish imkonini beradi. Har bir kontent toifalar (kategoriyalar) va mualliflar bilan bog‘langan.
        </p>
        <p class="mb-4">
            Bizning maqsadimiz — sifatli, ishonchli va tartibli kontentlarni foydalanuvchilarga taqdim etish. Admin foydalanuvchilar kontentni qo‘shishi, tahrirlashi yoki o‘chirishi mumkin.
        </p>
        <p>
            Agar sizda biron savol yoki taklif bo‘lsa, <a href="/contact" class="text-blue-500 underline">aloqa sahifasi</a> orqali biz bilan bog‘laning.
        </p>
    </div>

@endsection
