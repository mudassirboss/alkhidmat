@extends('layouts.app')

@section('title', 'Donate Now - Alkhidmat Foundation Muzaffargarh')

@section('content')
<!-- Hero Section -->
<div class="donation-hero">
    <div class="particles-container">
        <div class="particle particle-sm particle-white"></div>
        <div class="particle particle-md particle-gold"></div>
        <div class="particle particle-lg particle-white"></div>
    </div>
    <div class="container">
        <h1 class="reveal">Make a Difference Today</h1>
        <p class="reveal" style="font-size: 1.2rem; opacity: 0.9; max-width: 600px; margin: 0 auto 40px;">Your contribution save lives, educates children, and brings hope to the hopeless in Muzaffargarh.</p>
    </div>
</div>

<!-- Donation Form Section -->
<div class="container" style="position: relative; z-index: 20;">
    <div class="donation-wrapper reveal">
        <div class="donation-steps">
            <div class="step-item active">
                <span class="step-number">1</span> Choose Amount
            </div>
            <div class="step-item">
                <span class="step-number">2</span> Your Details
            </div>
            <div class="step-item">
                <span class="step-number">3</span> Payment
            </div>
        </div>

        <form action="{{ route('donate.store') }}" method="POST" id="donationForm" enctype="multipart/form-data" onsubmit="return validateDonation()">
            @csrf
            <div class="donation-form-container">
                @if ($errors->any())
                    <div class="alert alert-danger" style="color: #721c24; background-color: #f8d7da; border-color: #f5c6cb; padding: 15px; margin-bottom: 20px; border: 1px solid transparent; border-radius: 4px;">
                        <ul style="margin: 0; padding-left: 20px;">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                <!-- STEP 1: Amount -->
                <div id="step-1" class="step-content">
                    <!-- Donation Type Toggle -->
                    <div class="donation-type-toggle">
                        <button type="button" class="type-btn active" onclick="setDonationType('one-time')">One Time</button>
                        <button type="button" class="type-btn" onclick="setDonationType('monthly')">Monthly</button>
                    </div>
                    <input type="hidden" name="donation_type" id="donationType" value="one-time">

                    <!-- Amount Selection -->
                    <h3 class="text-center mb-4">Select Donation Amount</h3>
                    <div class="amount-grid">
                    <div class="amount-btn" onclick="selectAmount(1000, this)">
                        <span class="amount-value">PKR 1,000</span>
                        <span class="amount-desc">Provides a food pack for a small family</span>
                    </div>
                    <div class="amount-btn selected" onclick="selectAmount(3000, this)">
                        <span class="amount-value">PKR 3,000</span>
                        <span class="amount-desc">Supports an orphan for one month</span>
                    </div>
                    <div class="amount-btn" onclick="selectAmount(5000, this)">
                        <span class="amount-value">PKR 5,000</span>
                        <span class="amount-desc">Medical aid for 20 patients</span>
                    </div>
                    <div class="amount-btn" onclick="selectAmount(10000, this)">
                        <span class="amount-value">PKR 10,000</span>
                        <span class="amount-desc">Partial scholarship for a student</span>
                    </div>
                    <div class="amount-btn" onclick="selectAmount(25000, this)">
                        <span class="amount-value">PKR 25,000</span>
                        <span class="amount-desc">Installs a hand pump for clean water</span>
                    </div>
                    <div class="amount-btn" style="padding: 10px;">
                        <span class="amount-desc" style="display: block; margin-bottom: 5px;">Custom Amount</span>
                        <input type="number" name="amount" id="customAmount" class="custom-amount-input" placeholder="Enter Amount" oninput="selectCustomAmount(this)">
                    </div>
                    </div>
                    <input type="hidden" name="amount_final" id="amountFinal" value="3000">

                    <!-- Impact Visualizer -->
                    <div class="impact-showcase">
                        <div class="impact-icon">💙</div>
                        <div>
                            <h4 style="margin:0; color:#004080;">Your Impact</h4>
                            <p style="margin:0; color:#666;" id="impactText">Your donation of PKR 3,000 will help support an orphan child's education and basic needs for one month.</p>
                        </div>
                    </div>
                    
                    <div class="text-right mt-4" style="text-align: right;">
                        <button type="button" class="btn btn-primary px-4 py-2" onclick="nextStep(2)">Next: Your Details &rarr;</button>
                    </div>
                </div>

                <!-- STEP 2: Details -->
                <div id="step-2" class="step-content" style="display:none;">
                    <h3 class="mb-4">Your Information</h3>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label class="form-label">Full Name</label>
                            <input type="text" name="name" class="form-control" required placeholder="John Doe">
                        </div>
                        <div class="col-md-6 form-group">
                            <label class="form-label">Email Address</label>
                            <input type="email" name="email" class="form-control" required placeholder="john@example.com">
                        </div>
                        <div class="col-md-6 form-group">
                            <label class="form-label">Phone Number (Optional)</label>
                            <input type="text" name="phone" class="form-control" placeholder="+92 300 1234567">
                        </div>
                        <div class="col-md-6 form-group">
                            <label class="form-label">Purpose (Optional)</label>
                            <select name="purpose" class="form-control">
                                <option value="general">General Charity (Sadqah)</option>
                                <option value="zakat">Zakat</option>
                                <option value="orphan">Orphan Care</option>
                                <option value="health">Healthcare</option>
                                <option value="relief">Emergency Relief</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="d-flex justify-content-between mt-4">
                        <button type="button" class="btn btn-secondary px-4 py-2" onclick="prevStep(1)">&larr; Back</button>
                        <button type="button" class="btn btn-primary px-4 py-2" onclick="nextStep(3)">Next: Payment &rarr;</button>
                    </div>
                </div>

                <!-- STEP 3: Payment -->
                <div id="step-3" class="step-content" style="display:none;">
                    <h3 class="mb-4 mt-4">Payment Method</h3>
                    <div class="payment-methods" style="margin-bottom: 30px;">
                        <label class="amount-btn selected" style="width: 100%; display: flex; align-items: center; justify-content: center; gap: 10px; cursor: default;">
                            <input type="radio" name="payment_method" value="bank" checked onclick="return false;">
                            <span><i class="fas fa-university"></i> Bank Transfer / Online Deposit</span>
                        </label>
                    </div>

                    <!-- Payment Instructions & Details -->
                    <div id="paymentInstructions" style="display:block; background: #f0f7ff; padding: 25px; border-radius: 12px; border: 1px solid #cce5ff; margin-bottom: 30px; box-shadow: 0 4px 6px rgba(0,0,0,0.05);">
                        <h4 style="margin-top:0; color: #004080; border-bottom: 1px solid #dbeafe; padding-bottom: 10px; margin-bottom: 15px;">
                            <i class="fas fa-info-circle"></i> Transfer Details
                        </h4>
                        
                        <div class="bank-details-card" style="background: white; padding: 20px; border-radius: 8px; border-left: 5px solid #004080;">
                            <div style="margin-bottom: 15px;">
                                <strong style="color: #004080; display: block; font-size: 1.1rem; margin-bottom: 5px;">ONLINE ACCOUNT (JS BANK)</strong>
                                <div style="font-family: monospace; font-size: 1.1rem; background: #f8fafc; padding: 8px; border-radius: 4px;">PK62JSBL9560000000212088</div>
                            </div>

                            <div style="margin-bottom: 15px;">
                                <strong style="color: #004080; display: block; font-size: 1.1rem; margin-bottom: 5px;">MOBILE BANKING (JS BANK)</strong>
                                <div style="font-family: monospace; font-size: 1.1rem; background: #f8fafc; padding: 8px; border-radius: 4px;">212088</div>
                            </div>

                            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
                                <div>
                                    <span style="color: #64748b; font-size: 0.9rem;">Account Title</span>
                                    <div style="font-weight: 700; color: #334155;">AL KHIDMAT FOUNDATION DISTT</div>
                                </div>
                                <div>
                                    <span style="color: #64748b; font-size: 0.9rem;">Contact Us</span>
                                    <div style="font-weight: 700; color: #334155;">0330-9222977 / 0331-3138888</div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-6 form-group">
                                <label class="form-label" style="font-weight: 600;">Transaction ID <span style="color:red">*</span></label>
                                <input type="text" name="transaction_id" id="transactionId" class="form-control" placeholder="e.g. TID-123456789 or Reference No." required>
                                <small class="text-muted">Please enter the transaction reference number provided by your bank.</small>
                                <small style="color:red; display:none;" id="tidError">Transaction ID is required for verification.</small>
                            </div>
                            <div class="col-md-6 form-group">
                                <label class="form-label" style="font-weight: 600;">Upload Transaction Slip (Optional)</label>
                                <input type="file" name="receipt_file" class="form-control" accept="image/*,application/pdf">
                                <small class="text-muted">Attach a screenshot or photo of the receipt.</small>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between mt-4">
                        <button type="button" class="btn btn-secondary px-4 py-2" onclick="prevStep(2)">&larr; Back</button>
                        <button type="submit" class="donate-submit-btn">
                            Complete Donation <span id="btnAmount">PKR 3,000</span>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<div style="height: 100px;"></div>

@section('styles')
<link rel="stylesheet" href="{{ asset('css/donate.css') }}">
@endsection

@section('scripts')
<script>
    let currentStep = 1;

    function showStep(step) {
        // Hide all steps
        document.querySelectorAll('.step-content').forEach(el => el.style.display = 'none');
        document.querySelectorAll('.step-item').forEach(el => el.classList.remove('active'));

        // Show current step
        document.getElementById('step-' + step).style.display = 'block';
        
        // Update steppers
        for(let i=1; i<=step; i++) {
            document.querySelector(`.step-item:nth-child(${i})`).classList.add('active');
        }

        currentStep = step;
        window.scrollTo(0, 0);
    }

    function nextStep(step) {
        if (validateStep(currentStep)) {
            showStep(step);
        }
    }

    function prevStep(step) {
        showStep(step);
    }

    function validateStep(step) {
        if (step === 1) {
            // Amount is usually pre-selected or default, practically always valid unless emptied manually
            const amount = document.getElementById('amountFinal').value;
            if(!amount || amount < 100) {
                alert("Please select a valid donation amount (min 100).");
                return false;
            }
        }
        if (step === 2) {
            const name = document.querySelector('input[name="name"]').value;
            const email = document.querySelector('input[name="email"]').value;
            if (!name || !email) {
                alert("Please fill in your Name and Email.");
                return false;
            }
        }
        return true;
    }

    function setDonationType(type) {
        document.getElementById('donationType').value = type;
        document.querySelectorAll('.type-btn').forEach(btn => btn.classList.remove('active'));
        event.target.classList.add('active');
    }

    function selectAmount(amount, element) {
        document.getElementById('amountFinal').value = amount;
        document.getElementById('customAmount').value = '';
        document.querySelectorAll('.amount-btn').forEach(btn => btn.classList.remove('selected'));
        if(element) element.classList.add('selected');
        updateImpactText(amount);
    }

    function selectCustomAmount(element) {
        const amount = element.value;
        document.getElementById('amountFinal').value = amount;
        document.querySelectorAll('.amount-btn').forEach(btn => btn.classList.remove('selected'));
        updateImpactText(amount);
    }

    function updateImpactText(amount) {
        const btnText = document.getElementById('btnAmount');
        const impactText = document.getElementById('impactText');
        
        const formatted = new Intl.NumberFormat().format(amount);
        btnText.innerText = 'PKR ' + formatted;
        
        if(amount < 3000) {
            impactText.innerText = "Your contribution will provide essential medicines/food for a needy individual.";
        } else if(amount < 10000) {
            impactText.innerText = "You are supporting an orphan's education or providing a family food pack.";
        } else {
            impactText.innerText = "You are making a significant impact on education, healthcare, or clean water projects.";
        }
    }

    // Initialize
    document.addEventListener('DOMContentLoaded', function() {
        showStep(1);
        
        const form = document.getElementById('donationForm');
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            if (!validateStep(3)) { // Validate Transaction ID
                const tid = document.getElementById('transactionId').value;
                if(!tid) {
                    alert('Please enter Transaction ID');
                    document.getElementById('transactionId').focus();
                }
                return;
            }

            const formData = new FormData(form);
            const submitBtn = document.querySelector('.donate-submit-btn');
            const originalText = submitBtn.innerHTML;
            
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Processing...';

            fetch("{{ route('donate.store') }}", {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Show Success Message In-Place
                    document.querySelector('.donation-wrapper').innerHTML = `
                        <div class="success-card reveal">
                            <div class="success-icon-container">
                                <i class="fas fa-check success-icon"></i>
                            </div>
                            <h2 style="color: #004080; margin-bottom: 10px; font-weight: 800;">Thank You!</h2>
                            <p style="font-size: 1.1rem; color: #64748b; margin-bottom: 5px;">
                                Your donation has been received successfully.
                            </p>
                            
                            <div class="ref-box">
                                Ref ID: #${data.donation_id}
                            </div>
                            
                            <p class="text-muted" style="font-size: 0.95rem; max-width: 500px; margin: 0 auto 30px;">
                                We are verifying your transaction details. You will receive a formal tax receipt via email once approved.
                            </p>
                            
                            <div style="display: flex; gap: 15px; justify-content: center; flex-wrap: wrap;">
                                <a href="{{ route('home') }}" class="btn btn-outline-primary px-4">Return Home</a>
                                <a href="{{ route('donate.index') }}" class="btn btn-primary px-4" onclick="window.location.reload()">Donate Again</a>
                            </div>
                        </div>
                    `;
                    window.scrollTo(0, 0); // Scroll to top to see message
                } else {
                    alert('Something went wrong. Please try again.');
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = originalText;
                }
            })
            .catch(error => {
                console.error('Error:', error);
                
                // Try to parse validation errors
                if (error.response && error.response.data && error.response.data.errors) {
                    let msg = "Validation Error:\n";
                    for(let key in error.response.data.errors) {
                        msg += "- " + error.response.data.errors[key][0] + "\n";
                    }
                    alert(msg);
                } else {
                    alert('Submission failed. Please check your connection and try again.');
                }
                
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalText;
            });
        });
    });
</script>
@endsection

@endsection
