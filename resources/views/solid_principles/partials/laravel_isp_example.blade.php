<x-section_title class="mt-5" title="Cum implementează Laravel ISP:"/>
<p>Laravel folosește <b>interfețe specifice(fine-grained)</b> în code base-ul său.</p>
<x-code_snippet>
    // Laravel separates concerns into focused interfaces

    use Illuminate\Contracts\Auth\Authenticatable;
    use Illuminate\Contracts\Auth\CanResetPassword;
    use Illuminate\Contracts\Auth\MustVerifyEmail;

    // Basic user only needs authentication
    class BasicUser implements Authenticatable {
    public function getAuthIdentifierName() {
    return 'id';
    }

    public function getAuthIdentifier() {
    return $this->id;
    }

    public function getAuthPassword() {
    return $this->password;
    }

    // Other required methods...
    }

    // Advanced user can implement additional interfaces as needed
    class AdvancedUser implements
    Authenticatable,
    CanResetPassword,
    MustVerifyEmail {

    // Authenticatable methods
    public function getAuthIdentifierName() {
    return 'id';
    }

    // CanResetPassword methods
    public function getEmailForPasswordReset() {
    return $this->email;
    }

    public function sendPasswordResetNotification($token) {
    // Send reset email
    }

    // MustVerifyEmail methods
    public function hasVerifiedEmail() {
    return $this->email_verified_at !== null;
    }

    public function markEmailAsVerified() {
    $this->email_verified_at = now();
    }

    // Other methods...
    }
</x-code_snippet>
