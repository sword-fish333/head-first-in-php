<p class="font-semibold mt-4">vanilla PHP - exemplu greșit:</p>
<x-code_snippet>
    // BAD: Fat interface that forces implementation of unused methods

    interface WorkerInterface {
    public function work();
    public function eat();
    public function sleep();
    public function getPaid();
    public function takeVacation();
    public function fixBugs();
    public function attendMeetings();
    }

    // Human worker can do all these things
    class HumanWorker implements WorkerInterface {
    public function work() {
    echo "Working...\n";
    }

    public function eat() {
    echo "Eating lunch...\n";
    }

    public function sleep() {
    echo "Sleeping...\n";
    }

    public function getPaid() {
    echo "Receiving salary...\n";
    }

    public function takeVacation() {
    echo "On vacation...\n";
    }

    public function fixBugs() {
    echo "Fixing bugs...\n";
    }

    public function attendMeetings() {
    echo "In a meeting...\n";
    }
    }

    // Robot worker - forced to implement human behaviors it doesn't need!
    class RobotWorker implements WorkerInterface {
    public function work() {
    echo "Processing tasks...\n";
    }

    public function eat() {
    // Robots don't eat! But we're forced to implement this
    throw new Exception("Robots don't eat!");
    }

    public function sleep() {
    // Robots don't sleep!
    throw new Exception("Robots don't sleep!");
    }

    public function getPaid() {
    // Robots don't get paid!
    throw new Exception("Robots don't get paid!");
    }

    public function takeVacation() {
    // Robots don't take vacations!
    throw new Exception("Robots don't take vacations!");
    }

    public function fixBugs() {
    echo "Auto-fixing bugs...\n";
    }

    public function attendMeetings() {
    // Robots don't attend meetings!
    throw new Exception("Robots don't attend meetings!");
    }
    }
</x-code_snippet>
<p class="font-semibold mt-4">Vanilla PHP - exemplu corect:</p>
<x-code_snippet>
    // GOOD: Segregated interfaces - each interface has a specific purpose

    interface WorkableInterface {
    public function work();
    }

    interface EatableInterface {
    public function eat();
    }

    interface SleepableInterface {
    public function sleep();
    }

    interface PayableInterface {
    public function getPaid();
    }

    interface VacationableInterface {
    public function takeVacation();
    }

    interface BugFixerInterface {
    public function fixBugs();
    }

    interface MeetingAttendeeInterface {
    public function attendMeetings();
    }

    // Human worker implements only what makes sense
    class HumanWorker implements
    WorkableInterface,
    EatableInterface,
    SleepableInterface,
    PayableInterface,
    VacationableInterface,
    BugFixerInterface,
    MeetingAttendeeInterface {

    public function work() {
    echo "Working...\n";
    }

    public function eat() {
    echo "Eating lunch...\n";
    }

    public function sleep() {
    echo "Sleeping...\n";
    }

    public function getPaid() {
    echo "Receiving salary...\n";
    }

    public function takeVacation() {
    echo "On vacation...\n";
    }

    public function fixBugs() {
    echo "Fixing bugs...\n";
    }

    public function attendMeetings() {
    echo "In a meeting...\n";
    }
    }

    // Robot worker only implements what it actually does
    class RobotWorker implements WorkableInterface, BugFixerInterface {
    public function work() {
    echo "Processing tasks...\n";
    }

    public function fixBugs() {
    echo "Auto-fixing bugs...\n";
    }
    }

    // Freelancer might have a different combination
    class FreelanceWorker implements
    WorkableInterface,
    PayableInterface,
    BugFixerInterface {

    public function work() {
    echo "Working on project...\n";
    }

    public function getPaid() {
    echo "Invoice paid...\n";
    }

    public function fixBugs() {
    echo "Fixing bugs at hourly rate...\n";
    }
    }

    // Now we can work with specific capabilities
    class ProjectManager {
    private array $workers = [];
    private array $bugFixers = [];

    public function addWorker(WorkableInterface $worker) {
    $this->workers[] = $worker;
    }

    public function addBugFixer(BugFixerInterface $fixer) {
    $this->bugFixers[] = $fixer;
    }

    public function startSprint() {
    foreach ($this->workers as $worker) {
    $worker->work();
    }
    }

    public function fixCriticalBug() {
    foreach ($this->bugFixers as $fixer) {
    $fixer->fixBugs();
    }
    }
    }
</x-code_snippet>
