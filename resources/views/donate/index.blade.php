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

        <form action="{{ route('donate.store') }}" method="POST" id="donationForm" enctype="multipart/form-data">
            @csrf
            <div class="donation-form-container">
                
                <!-- Donation Type Toggle -->
                <div class="donation-type-toggle">
                    <button type="button" class="type-btn active" onclick="setDonationType('one-time')">One Time</button>
                    <button type="button" class="type-btn" onclick="setDonationType('monthly')">Monthly</button>
                </div>
                <input type="hidden" name="donation_type" id="donationType" value="one-time">

                <!-- Amount Selection -->
                <h3 class="text-center mb-4">Select Donation Amount</h3>
                <div class="amount-grid">
                    <div class="amount-btn" onclick="selectAmount(1000)">
                        <span class="amount-value">PKR 1,000</span>
                        <span class="amount-desc">Provides a food pack for a small family</span>
                    </div>
                    <div class="amount-btn selected" onclick="selectAmount(3000)">
                        <span class="amount-value">PKR 3,000</span>
                        <span class="amount-desc">Supports an orphan for one month</span>
                    </div>
                    <div class="amount-btn" onclick="selectAmount(5000)">
                        <span class="amount-value">PKR 5,000</span>
                        <span class="amount-desc">Medical aid for 20 patients</span>
                    </div>
                    <div class="amount-btn" onclick="selectAmount(10000)">
                        <span class="amount-value">PKR 10,000</span>
                        <span class="amount-desc">Partial scholarship for a student</span>
                    </div>
                    <div class="amount-btn" onclick="selectAmount(25000)">
                        <span class="amount-value">PKR 25,000</span>
                        <span class="amount-desc">Installs a hand pump for clean water</span>
                    </div>
                    <div class="amount-btn" style="padding: 10px;">
                        <span class="amount-desc" style="display: block; margin-bottom: 5px;">Custom Amount</span>
                        <input type="number" name="amount" id="customAmount" class="custom-amount-input" placeholder="Enter Amount" oninput="selectCustomAmount()">
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

                <hr style="margin: 40px 0; border-top: 1px solid #eee;">

                <!-- Donor Details -->
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

                <!-- Payment Method -->
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

                <button type="submit" class="donate-submit-btn" onclick="return validateDonation()">
                    Complete Donation <span id="btnAmount">PKR 3,000</span>
                </button>

                <div class="trust-badges">
                    <div class="trust-item">🔒 Secure Payment</div>
                    <div class="trust-item">✅ Tax Deductible</div>
                    <div class="trust-item">🛡️ 100% Transparent</div>
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
    function setDonationType(type) {
        document.getElementById('donationType').value = type;
        document.querySelectorAll('.type-btn').forEach(btn => btn.classList.remove('active'));
        event.target.classList.add('active');
    }

    function selectAmount(amount) {
        document.getElementById('amountFinal').value = amount;
        document.getElementById('customAmount').value = '';
        document.querySelectorAll('.amount-btn').forEach(btn => btn.classList.remove('selected'));
        event.currentTarget.classList.add('selected');
        updateImpactText(amount);
    }

    function selectCustomAmount() {
        const amount = document.getElementById('customAmount').value;
        document.getElementById('amountFinal').value = amount;
        document.querySelectorAll('.amount-btn').forEach(btn => btn.classList.remove('selected'));
        updateImpactText(amount);
    }

    function updateImpactText(amount) {
        const btnText = document.getElementById('btnAmount');
        const impactText = document.getElementById('impactText');
        
        btnText.innerText = 'PKR ' + new Intl.NumberFormat().format(amount);
        
        if(amount < 3000) {
            impactText.innerText = "Your contribution will provide essential medicines/food for a needy individual.";
        } else if(amount < 10000) {
            impactText.innerText = "You are supporting an orphan's education or providing a family food pack.";
        } else {
            impactText.innerText = "You are making a significant impact on education, healthcare, or clean water projects.";
        }
    }

    function validateDonation() {
        const tid = document.getElementById('transactionId').value;
        if (!tid) {
            document.getElementById('tidError').style.display = 'block';
            document.getElementById('transactionId').focus();
            return false;
        }
        return true;
    }
</script>
@endsection

@endsection
