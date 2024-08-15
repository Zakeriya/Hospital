@extends('front.layout')

@section('title')
    Doctors
@endsection

@section('doctors-active')
    active
@endsection

@section('content')
    <x-hero-section-component pageTitle="Doctors" bannerTitle="Our Doctors"></x-hero-section-component>

    <x-doctor-component count="30" text=""></x-doctor-component>


      {{-- Appointment section  --}}
    <x-appointment-component></x-appointment-component>
    {{-- End Of  Appointment section  --}}
@endsection