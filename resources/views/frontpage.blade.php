@extends('layouts.app')

@section('content')

@include('partials._header')

<main id="features">
    <div class="container">
        <div class="row" style="padding-top: 4rem;padding-bottom: 4rem;">
            <div class="col-md-6 col-lg-4 my-2">
                <h4><i class="fas fa-code mr-2" style="color: rgb(144,58,251);"></i>Open Source</h4>
                <p>ON_Board is an Open Source Project. Security and transparency is at the heart of all we do. Your platform, your rules.</p>
            </div>
            <div class="col-md-6 col-lg-4 my-2">
                <h4><i class="fas fa-users mr-2" style="color: rgb(144,58,251);"></i>Unlimited Students</h4>
                <p>We provide a platform that allows schools and organizations to scale up to any amount of users, while keeping resource consumption low.</p>
            </div>
            <div class="col-md-6 col-lg-4 my-2">
                <h4><i class="fas fa-shield-alt mr-2" style="color: rgb(144,58,251);"></i>Secure by Design</h4>
                <p>ON_Board is built on top of the most reliable and secure web technologies, to give you and your users peace of mind.</p>
            </div>
        </div>
    </div>
    <div class="container" style="background-color: rgba(147,59,255,0.1);">
        <div class="row">
            <div class="col text-center" style="padding-top: 4rem;padding-bottom: 4rem;">
                <h2 style="color: rgb(0,0,0);">What's&nbsp;<span class="on_board_header" style="font-family: Raleway, sans-serif;font-weight: 900;color: rgb(255,255,255);"><span style="font-family: 'Gloria Hallelujah', cursive;">ON_</span>BOARD</span>
                </h2>
                <p class="my-4" style="max-width: 80%;margin: auto;color: rgb(0,0,0);font-size: 1.2rem;">It is very important for every institution to educate it’s new coming students about the school’s policies and procedures, as well as to engage them into what is going to be their future student life. On_Board<sup><em>verb</em></sup>                        helps your institution accomplish just that, by providing an open source and robust platform where you can deploy the most amazing virtual orientations, simple and easy. </p>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row" style="padding-top: 4rem;padding-bottom: 4rem;">
            <div class="col-md-6 align-self-center">
                <h2>Features</h2>
                <ul class="list-group list-group-flush feature-list">
                    <li class="list-group-item border-0">
                        <i class="fas fa-paint-roller mr-3 feature-icon"></i><span>Custom orientation styling.</span>
                    </li>
                    <li class="list-group-item border-0">
                        <i class="fas fa-clipboard-list mr-3 feature-icon"></i><span>Sections of type video, rich text, and assessments.</span>
                    </li>
                    <li class="list-group-item border-0">
                        <i class="fas fa-user mr-3 feature-icon"></i><span>Student invitation tool.</span>
                    </li>
                    <li class="list-group-item border-0">
                        <i class="fas fa-tachometer-alt mr-3 feature-icon"></i><span>Admin and Advisor dashboards.</span>
                    </li>
                    <li class="list-group-item border-0">
                        <i class="fas fa-paper-plane mr-3 feature-icon"></i><span>Email notification system.</span>
                    </li>
                </ul>
            </div>
            <div class="col-md-6">
                <img style="width: 100%;" src="{{ url('storage/img/undraw_elements_cipa.svg') }}">
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row" id="pricing" style="padding-top: 4rem;padding-bottom: 4rem;">
            <div class="col-md-12 text-center">
                <h2 style="margin-bottom: 2rem;">Pricing</h2>
            </div>
            <div class="col col-md-12">
                <p>On_Board is and always will be free, but we also know that institutions don't always have the time, or in-house infrastructure to manage this kind of software.</p>
                <p>We offer affordable hosting packages where we take care of the server setup, the installation, all the software upgrades, database backups, plus you get priority support for any issues that may come up.</p>
                <p>If you need to host it yourself, our <a class="font-weight-bold link" href="{{ url('support/get-started') }}">dedicated support plan</a>&nbsp;makes it easy to get help when you need it.</p>
                <p><a class="font-weight-bold link" href="#">Chat with us</a>, or <a class="font-weight-bold link" href="mailto:info@registrac.page?subject=About_Ob_Board_App">send us an email</a>&nbsp;with any questions!</p>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-body px-0 pb-0">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="border-0 text-center">
                                    <tr class="border-top-0">
                                        <th class="border-top-0 pt-0"></th>
                                        <th class="border-top-0 pt-0">Self-Hosting</th>
                                        <th class="border-top-0 pt-0">Hosted (Monthly)</th>
                                        <th class="border-top-0 pt-0">Hosted (Annual)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="text-center bg-warning">
                                        <td class="align-middle">Price</td>
                                        <td class="text-capitalize" style="font-size: 1.2rem;">Free</td>
                                        <td class="font-weight-bold" style="font-size: 1.2rem;">$69.99/month</td>
                                        <td class="font-weight-bold" style="font-size: 1.2rem;">$699.99/year</td>
                                    </tr>
                                    <tr class="text-center">
                                        <td class="align-middle">Max Users</td>
                                        <td class="text-capitalize" style="font-size: 1.2rem;"><i class="fas fa-infinity text-muted"></i></td>
                                        <td style="font-size: 1.2rem;"><i class="fas fa-infinity text-muted"></i></td>
                                        <td class="font-weight-bold" style="font-size: 1.2rem;"><i class="fas fa-infinity text-muted"></i></td>
                                    </tr>
                                    <tr class="text-center">
                                        <td class="align-middle">Max Orientations</td>
                                        <td class="text-capitalize" style="font-size: 1.2rem;"><i class="fas fa-infinity text-muted"></i></td>
                                        <td style="font-size: 1.2rem;"><i class="fas fa-infinity text-muted"></i></td>
                                        <td class="font-weight-bold" style="font-size: 1.2rem;"><i class="fas fa-infinity text-muted"></i></td>
                                    </tr>
                                    <tr class="text-center">
                                        <td class="align-middle">Github Support</td>
                                        <td class="text-capitalize" style="font-size: 1.2rem;"><i class="fas fa-check text-success"></i></td>
                                        <td style="font-size: 1.2rem;"><i class="fas fa-check text-success"></i></td>
                                        <td class="font-weight-bold" style="font-size: 1.2rem;"><i class="fas fa-check text-success"></i></td>
                                    </tr>
                                    <tr class="text-center">
                                        <td class="align-middle">Phone/Email Support</td>
                                        <td class="text-capitalize" style="font-size: 1.2rem;"><i class="fas fa-times text-danger"></i></td>
                                        <td style="font-size: 1.2rem;"><i class="fas fa-check text-success"></i></td>
                                        <td class="font-weight-bold" style="font-size: 1.2rem;"><i class="fas fa-check text-success"></i></td>
                                    </tr>
                                    <tr class="text-center">
                                        <td class="align-middle">TLS Included</td>
                                        <td class="text-capitalize" style="font-size: 1.2rem;"><i class="fas fa-times text-danger"></i></td>
                                        <td style="font-size: 1.2rem;"><i class="fas fa-check text-success"></i></td>
                                        <td class="font-weight-bold" style="font-size: 1.2rem;"><i class="fas fa-check text-success"></i></td>
                                    </tr>
                                    <tr class="text-center">
                                        <td class="align-middle">Server Backups</td>
                                        <td class="text-capitalize" style="font-size: 1.2rem;"><i class="fas fa-times text-danger"></i></td>
                                        <td style="font-size: 1.2rem;"><i class="fas fa-check text-success"></i></td>
                                        <td class="font-weight-bold" style="font-size: 1.2rem;"><i class="fas fa-check text-success"></i></td>
                                    </tr>
                                    <tr class="text-center">
                                        <td class="align-middle">Automatic Upgrades</td>
                                        <td class="text-capitalize" style="font-size: 1.2rem;"><i class="fas fa-times text-danger"></i></td>
                                        <td style="font-size: 1.2rem;"><i class="fas fa-check text-success"></i></td>
                                        <td class="font-weight-bold" style="font-size: 1.2rem;"><i class="fas fa-check text-success"></i></td>
                                    </tr>
                                    <tr class="text-center">
                                        <td class="align-middle">Server Maintenance</td>
                                        <td class="text-capitalize" style="font-size: 1.2rem;"><i class="fas fa-times text-danger"></i></td>
                                        <td style="font-size: 1.2rem;"><i class="fas fa-check text-success"></i></td>
                                        <td class="font-weight-bold" style="font-size: 1.2rem;"><i class="fas fa-check text-success"></i></td>
                                    </tr>
                                    <tr class="text-center">
                                        <td class="align-middle"></td>
                                        <td class="text-capitalize" style="font-size: 1.2rem;">
                                            <a class="btn btn-warning text-uppercase" role="button" href="{{ url('download') }}"><i class="fas fa-download mr-1"></i>Download</a>
                                        </td>
                                        <td style="font-size: 1.2rem;">
                                            <button class="btn btn-warning text-uppercase disabled" disabled type="button">Coming Soon</button>
                                        </td>
                                        <td class="font-weight-bold" style="font-size: 1.2rem;">
                                            <button class="btn btn-warning text-uppercase disabled" disabled type="button">Coming Soon</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
{{-- <!-- Start: Subscribe --> --}}
<div style="background-color: #933cff;">
    <div class="container">
        <div class="row" style="padding-top: 5%;padding-bottom: 5%;">
            <div class="col-md-12 text-center" style="color: rgb(254,255,255);">
                <h2>Stay in the Loop!</h2>
                <p style="font-weight: 400;">We will never spam you or give away your information to any Third-Parties, and we will only email you about what's important.</p>
                <a class="btn btn-warning" role="button" href="http://eepurl.com/hashVD" target="_blank">JOIN MAILING LIST</a>
            </div>
        </div>
    </div>
</div>
{{-- <!-- End: Subscribe --> --}}

@endsection
