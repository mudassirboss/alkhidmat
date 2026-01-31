@extends('layouts.app')

@section('title', 'Volunteer Registration - Alkhidmat Foundation Muzaffargarh')

@section('content')
<!-- Hero Section -->
<section class="volunteer-hero">
    <div class="container">
        <h1 class="hero-title">Join Our Volunteer Team</h1>
        <p class="hero-subtitle">Be a beacon of hope and make a real difference in Muzaffargarh</p>
    </div>
</section>

<!-- Registration Form Section -->
<section class="volunteer-registration">
    <div class="container">
        @if(session('success'))
            <div class="success-message">
                <svg width="24" height="24" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"/>
                </svg>
                <div>
                    <h3>Registration Successful!</h3>
                    <p>{{ session('success') }}</p>
                    <p>For any queries, contact our Volunteer Management Department:</p>
                    <p><strong>WhatsApp:</strong> 0300-0776015 | <strong>Email:</strong> volunteer@alkhidmat.org</p>
                </div>
            </div>
        @endif

        <div class="form-wrapper">
            <div class="form-header">
                <h2>Volunteer Registration Form</h2>
                <p>Fill in the details below to join our mission of serving humanity</p>
            </div>

            <form method="POST" action="{{ route('volunteer.submit') }}" class="volunteer-form">
                @csrf

                <!-- Required Fields Section -->
                <div class="form-section">
                    <h3 class="section-title">
                        <span class="section-number">01</span>
                        Required Information
                    </h3>
                    <div class="form-grid">
                        <div class="form-group full-width">
                            <label for="volunteer_name">Full Name <span class="required">*</span></label>
                            <input type="text" id="volunteer_name" name="volunteer_name" required value="{{ old('volunteer_name') }}">
                            @error('volunteer_name')<span class="error">{{ $message }}</span>@enderror
                        </div>

                        <div class="form-group">
                            <label for="email">Email <span class="required">*</span></label>
                            <input type="email" id="email" name="email" required value="{{ old('email') }}">
                            @error('email')<span class="error">{{ $message }}</span>@enderror
                        </div>

                        <div class="form-group">
                            <label for="mobile_no">Mobile No <span class="required">*</span></label>
                            <input type="tel" id="mobile_no" name="mobile_no" placeholder="03XX-XXXXXXX" required value="{{ old('mobile_no') }}">
                            @error('mobile_no')<span class="error">{{ $message }}</span>@enderror
                        </div>

                        <div class="form-group">
                            <label for="country">Country <span class="required">*</span></label>
                            <select id="country" name="country" required>
                                <option value="">Select Country</option>
                                <option value="Pakistan" {{ old('country') == 'Pakistan' ? 'selected' : '' }}>Pakistan</option>
                                <option value="United States" {{ old('country') == 'United States' ? 'selected' : '' }}>United States</option>
                                <option value="United Kingdom" {{ old('country') == 'United Kingdom' ? 'selected' : '' }}>United Kingdom</option>
                                <option value="Canada" {{ old('country') == 'Canada' ? 'selected' : '' }}>Canada</option>
                                <option value="Australia" {{ old('country') == 'Australia' ? 'selected' : '' }}>Australia</option>
                                <option value="Saudi Arabia" {{ old('country') == 'Saudi Arabia' ? 'selected' : '' }}>Saudi Arabia</option>
                                <option value="United Arab Emirates" {{ old('country') == 'United Arab Emirates' ? 'selected' : '' }}>United Arab Emirates</option>
                                <option value="Other" {{ old('country') == 'Other' ? 'selected' : '' }}>Other</option>
                            </select>
                            @error('country')<span class="error">{{ $message }}</span>@enderror
                        </div>

                        <div class="form-group">
                            <label for="gender">Gender <span class="required">*</span></label>
                            <select id="gender" name="gender" required>
                                <option value="">Select Gender</option>
                                <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                                <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                            </select>
                            @error('gender')<span class="error">{{ $message }}</span>@enderror
                        </div>

                        <div class="form-group">
                            <label for="date_of_birth">Date Of Birth <span class="required">*</span></label>
                            <input type="date" id="date_of_birth" name="date_of_birth" required value="{{ old('date_of_birth') }}">
                            @error('date_of_birth')<span class="error">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>

                <!-- Optional Information Section -->
                <div class="form-section">
                    <h3 class="section-title">
                        <span class="section-number">02</span>
                        Additional Information (Optional)
                    </h3>
                    <div class="form-grid">
                        <div class="form-group">
                            <label for="district">Current District / City</label>
                            <input type="text" id="district" name="district" placeholder="e.g., Muzaffargarh, Multan" value="{{ old('district') }}">
                            @error('district')<span class="error">{{ $message }}</span>@enderror
                        </div>

                        <div class="form-group">
                            <label for="blood_group">Blood Group</label>
                            <select id="blood_group" name="blood_group">
                                <option value="">Select Blood Group</option>
                                <option value="A+" {{ old('blood_group') == 'A+' ? 'selected' : '' }}>A+</option>
                                <option value="A-" {{ old('blood_group') == 'A-' ? 'selected' : '' }}>A-</option>
                                <option value="B+" {{ old('blood_group') == 'B+' ? 'selected' : '' }}>B+</option>
                                <option value="B-" {{ old('blood_group') == 'B-' ? 'selected' : '' }}>B-</option>
                                <option value="AB+" {{ old('blood_group') == 'AB+' ? 'selected' : '' }}>AB+</option>
                                <option value="AB-" {{ old('blood_group') == 'AB-' ? 'selected' : '' }}>AB-</option>
                                <option value="O+" {{ old('blood_group') == 'O+' ? 'selected' : '' }}>O+</option>
                                <option value="O-" {{ old('blood_group') == 'O-' ? 'selected' : '' }}>O-</option>
                                <option value="Not Specified" {{ old('blood_group') == 'Not Specified' ? 'selected' : '' }}>Not Specified</option>
                            </select>
                            @error('blood_group')<span class="error">{{ $message }}</span>@enderror
                        </div>

                        <div class="form-group">
                            <label for="area_of_interest">Area Of Interest</label>
                            <select id="area_of_interest" name="area_of_interest">
                                <option value="">Select Area</option>
                                <option value="Healthcare" {{ old('area_of_interest') == 'Healthcare' ? 'selected' : '' }}>Healthcare</option>
                                <option value="Education" {{ old('area_of_interest') == 'Education' ? 'selected' : '' }}>Education</option>
                                <option value="Orphan Care" {{ old('area_of_interest') == 'Orphan Care' ? 'selected' : '' }}>Orphan Care</option>
                                <option value="Emergency Relief" {{ old('area_of_interest') == 'Emergency Relief' ? 'selected' : '' }}>Emergency Relief</option>
                                <option value="Water Projects" {{ old('area_of_interest') == 'Water Projects' ? 'selected' : '' }}>Water Projects</option>
                                <option value="Food Distribution" {{ old('area_of_interest') == 'Food Distribution' ? 'selected' : '' }}>Food Distribution</option>
                                <option value="Women Empowerment" {{ old('area_of_interest') == 'Women Empowerment' ? 'selected' : '' }}>Women Empowerment</option>
                                <option value="Youth Development" {{ old('area_of_interest') == 'Youth Development' ? 'selected' : '' }}>Youth Development</option>
                                <option value="IT / Digital Services" {{ old('area_of_interest') == 'IT / Digital Services' ? 'selected' : '' }}>IT / Digital Services</option>
                            </select>
                            @error('area_of_interest')<span class="error">{{ $message }}</span>@enderror
                        </div>

                        <div class="form-group">
                            <label for="current_institute">Current Institute</label>
                            <input type="text" id="current_institute" name="current_institute" placeholder="e.g., University name, Company name" value="{{ old('current_institute') }}">
                            @error('current_institute')<span class="error">{{ $message }}</span>@enderror
                        </div>

                        <div class="form-group">
                            <label for="reference_code">Reference Code</label>
                            <input type="text" id="reference_code" name="reference_code" placeholder="If referred by someone" value="{{ old('reference_code') }}">
                            @error('reference_code')<span class="error">{{ $message }}</span>@enderror
                        </div>
                    </div>

                    <div class="form-grid" style="margin-top: var(--space-md);">
                        <div class="form-group">
                            <label class="checkbox-label">
                                <input type="checkbox" name="has_disability" value="1" {{ old('has_disability') ? 'checked' : '' }}>
                                <span>Has a Disability</span>
                            </label>
                        </div>

                        <div class="form-group">
                            <label class="checkbox-label">
                                <input type="checkbox" name="alkhidmat_digital_team" value="1" {{ old('alkhidmat_digital_team') ? 'checked' : '' }}>
                                <span>Interested in Alkhidmat Digital Team</span>
                            </label>
                        </div>
                    </div>

                    <div class="form-group full-width" style="margin-top: var(--space-lg);">
                        <label for="why_interested">Why are you interested? Related Experience if any?</label>
                        <textarea id="why_interested" name="why_interested" rows="4" placeholder="Tell us about your motivation and any relevant experience...">{{ old('why_interested') }}</textarea>
                        @error('why_interested')<span class="error">{{ $message }}</span>@enderror
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="form-actions">
                    <button type="submit" class="btn-submit">
                        <svg width="20" height="20" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"/>
                        </svg>
                        Submit Registration
                    </button>
                    <p class="form-note">By submitting this form, you agree to join Alkhidmat Foundation's volunteer network and receive updates via WhatsApp and email.</p>
                </div>
            </form>
        </div>

        <!-- Contact Info -->
        <div class="contact-info">
            <h3>Need Help?</h3>
            <p>For any queries regarding volunteer registration:</p>
            <div class="contact-details">
                <div class="contact-item">
                    <svg width="20" height="20" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/>
                    </svg>
                    <span>0300-0776015 (WhatsApp)</span>
                </div>
                <div class="contact-item">
                    <svg width="20" height="20" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                    </svg>
                    <span>volunteer@alkhidmat.org</span>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('styles')
<link rel="stylesheet" href="{{ asset('css/volunteer.css') }}">
@endsection
