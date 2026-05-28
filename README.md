# Support Ticket Platform - Premium SaaS Solution

A modern, production-ready enterprise-grade support ticket management system built with Laravel 12, Livewire, FilamentPHP, and TailwindCSS.

## 🚀 Features

### 🔐 Authentication & Security
- User registration and login with email verification
- Password reset with secure token
- Two-factor authentication (2FA) with QR codes
- Remember me functionality
- Session management with login activity tracking
- Rate limiting on authentication endpoints
- CSRF, XSS, and SQL injection protection
- IP logging and comprehensive audit trails
- Secure password hashing with bcrypt
- Session security and timeout management

### 👥 Advanced User Management
- User profiles with avatar upload (image validation)
- Granular role-based access control (User, Support, Moderator, Admin)
- User suspension and ban system with reason tracking
- Online/offline status with last seen tracking
- Comprehensive activity logging system
- User login history with device and IP information
- Permission-based access control (policies)
- User metrics and engagement tracking

### 🎟️ Comprehensive Ticket System
- Create and manage support tickets with detailed information
- Multi-level replies with real-time updates via Livewire
- Internal staff notes (invisible to end users)
- Secure file attachments with virus scanning support
- Ticket categorization and advanced tagging
- Priority levels (Low, Medium, High, Critical)
- Status tracking (Open, Answered, Waiting, Closed)
- Intelligent ticket assignment to support staff
- Advanced search, filtering, and sorting capabilities
- Ticket merge functionality to consolidate duplicates
- Read/unread message indicators
- Real-time typing indicators
- Ticket close/reopen with reason tracking
- SLA tracking and response time monitoring
- Customer satisfaction ratings

### 📊 Powerful Admin Dashboard (FilamentPHP)
- Beautiful analytics dashboard with key metrics
- Real-time statistics widgets
- User management with bulk actions
- Comprehensive ticket management interface
- Role and permission management system
- Ban/suspension management with history
- Detailed system activity and audit logs
- Email configuration and SMTP settings management
- Site-wide settings and customization
- Maintenance mode control
- Announcement system for notifications
- Notification management and templates
- Custom report generation

### 🎨 Modern SaaS-Like UI/UX
- Beautiful design inspired by Discord, Linear, Notion, and Slack
- Dark/Light mode support with system preference detection
- Mobile-first responsive design
- Smooth animations and transitions
- Toast notifications with auto-dismiss
- Loading states and skeleton loaders
- Elegant modal system for dialogs
- Empty states with helpful guidance
- Modern cards, tables, and forms
- Accessibility features (ARIA labels, keyboard navigation)
- Sidebar navigation with collapsible sections
- Breadcrumb navigation
- Customizable dashboard widgets

### 📱 PWA & Real-time Features
- Progressive Web App manifest and service workers
- Web push notifications support
- Real-time updates with Livewire
- Offline capability with caching strategy
- App install prompts
- Works on mobile, tablet, and desktop

### 🔌 RESTful API & Integration
- Complete RESTful API for third-party integration
- API token authentication with scopes
- Rate limiting per API key
- Comprehensive API documentation
- Ticket endpoints (CRUD operations)
- User endpoints (CRUD operations)
- Admin endpoints (admin only)
- Proper HTTP status codes and error handling
- JSON responses with metadata
- API versioning support

### 📧 Professional Email System
- SMTP support with configurable settings
- Queue-based email processing (async)
- Professional email templates
- Ticket creation notifications
- Ticket reply notifications
- Password reset emails
- Email verification
- HTML and plain text email support
- Email preview in admin panel

### 🌍 Multi-Language Support
- Localization system for multiple languages
- Turkish (TR) and English (EN) support included
- Easy to add more languages
- Language switcher in UI
- Dynamic language switching without reload
- Translation management in admin panel

### ⚙️ Advanced Features
- Cron job scheduler for recurring tasks
- Queue system for heavy operations (Redis/Database)
- Background job processing
- Database query optimization with eager loading
- Comprehensive caching system
- Database indexing for performance
- RESTful API with proper versioning
- Webhook support for external integrations
- Activity logging for compliance
- File storage with S3 support

## 📋 Tech Stack

- **Backend**: PHP 8.3 with Laravel 12
- **Database**: MySQL 8.0+ (PostgreSQL compatible)
- **Frontend**: TailwindCSS 3 + Livewire 3 + Alpine.js 3
- **Admin Panel**: FilamentPHP 3
- **Authentication**: Laravel Breeze with custom enhancements
- **Queue**: Redis or Database driver
- **Cache**: Redis recommended (File fallback)
- **Real-time**: Laravel Livewire for reactive components
- **Mail**: SMTP with queue support
- **Testing**: PHPUnit with Laravel testing utilities

## 🔧 Requirements

- PHP 8.3 or higher
- MySQL 8.0+ or PostgreSQL 12+
- Composer 2.0+
- Node.js 18+ with npm or yarn
- Redis 6+ (optional but recommended for queue/cache)
- Supervisor (for production queue workers)

## 📦 Installation Guide

### Prerequisites

Ensure you have all requirements installed:
```bash
php --version        # Should be 8.3+
mysql --version      # Should be 8.0+
composer --version   # Should be 2.0+
node --version       # Should be 18+
```

### Step 1: Clone Repository

```bash
git clone https://github.com/hapyhapyhapy6931-ops/feyyazojan.git
cd feyyazojan
```

### Step 2: Install PHP Dependencies

```bash
composer install
```

For production:
```bash
composer install --no-dev --optimize-autoloader
```

### Step 3: Install Node Dependencies

```bash
npm install
# or
yarn install
```

### Step 4: Environment Configuration

```bash
cp .env.example .env
php artisan key:generate
```

Edit `.env` file and configure:

```env
APP_NAME="Support Ticket Platform"
APP_ENV=production
APP_DEBUG=false
APP_URL=https://yourdomain.com

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=support_platform
DB_USERNAME=root
DB_PASSWORD=your_password

MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=587
MAIL_USERNAME=your_username
MAIL_PASSWORD=your_password
MAIL_FROM_ADDRESS=support@yourdomain.com

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

QUEUE_CONNECTION=redis
```

### Step 5: Create Database

```bash
mysql -u root -p -e "CREATE DATABASE support_platform CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"
```

### Step 6: Run Migrations and Seeders

```bash
php artisan migrate
php artisan db:seed
```

For fresh database (caution - deletes all data):
```bash
php artisan migrate:fresh --seed
```

### Step 7: Build Frontend Assets

Development:
```bash
npm run dev
```

Production:
```bash
npm run build
```

### Step 8: Setup File Storage

```bash
php artisan storage:link
chmod -R 775 storage bootstrap/cache
```

### Step 9: Cache Configuration

```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

### Step 10: Generate PWA Manifest

```bash
php artisan pwa:generate
```

### Step 11: Start Development Server

```bash
php artisan serve
```

Visit `http://localhost:8000` in your browser.

### Step 12: Queue Worker (Optional but Recommended)

In a separate terminal:
```bash
php artisan queue:work
```

For production, use Supervisor (see Production Deployment section).

## 🎯 Default Credentials (Development)

After running seeders, use these credentials:

**Admin User:**
- Email: `admin@example.com`
- Password: `password`
- Role: Administrator

**Support Staff:**
- Email: `support@example.com`
- Password: `password`
- Role: Support Agent

**Moderator:**
- Email: `moderator@example.com`
- Password: `password`
- Role: Moderator

**Regular User:**
- Email: `user@example.com`
- Password: `password`
- Role: User

**⚠️ Important**: Change these credentials immediately in production!

## 📂 Project Structure

```
feyyazojan/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Auth/
│   │   │   │   ├── AuthenticatedSessionController.php
│   │   │   │   ├── ConfirmablePasswordController.php
│   │   │   │   ├── EmailVerificationNotificationController.php
│   │   │   │   ├── EmailVerificationPromptController.php
│   │   │   │   ├── NewPasswordController.php
│   │   │   │   ├── PasswordController.php
│   │   │   │   ├── PasswordResetLinkController.php
│   │   │   │   ├── RegisteredUserController.php
│   │   │   │   └── VerifyEmailController.php
│   │   │   ├── Admin/
│   │   │   │   ├── DashboardController.php
│   │   │   │   ├── UserManagementController.php
│   │   │   │   ├── TicketManagementController.php
│   │   │   │   ├── ReportController.php
│   │   │   │   └── SettingsController.php
│   │   │   ├── Api/
│   │   │   │   ├── ApiAuthController.php
│   │   │   │   ├── TicketApiController.php
│   │   │   │   ├── UserApiController.php
│   │   │   │   └── StatisticsApiController.php
│   │   │   ├── DashboardController.php
│   │   │   ├── TicketController.php
│   │   │   ├── UserController.php
│   │   │   ├── ProfileController.php
│   │   │   └── NotificationController.php
│   │   ├── Middleware/
│   │   │   ├── Authenticate.php
│   │   │   ├── RedirectIfAuthenticated.php
│   │   │   ├── IsAdmin.php
│   │   │   ├── IsSupport.php
│   │   │   ├── CheckBanned.php
│   │   │   ├── RateLimitApi.php
│   │   │   └── LogActivity.php
│   │   ├── Requests/
│   │   │   ├── StoreTicketRequest.php
│   │   │   ├── UpdateTicketRequest.php
│   │   │   ├── StoreReplyRequest.php
│   │   │   └── UpdateProfileRequest.php
│   │   └── Resources/
│   │       ├── TicketResource.php
│   │       ├── UserResource.php
│   │       └── ReplyResource.php
│   ├── Models/
│   │   ├── User.php
│   │   ├── Ticket.php
│   │   ├── TicketReply.php
│   │   ├── TicketCategory.php
│   │   ├── TicketTag.php
│   │   ├── TicketAttachment.php
│   │   ├── ActivityLog.php
│   │   ├── LoginHistory.php
│   │   ├── BannedUser.php
│   │   ├── Notification.php
│   │   ├── ApiToken.php
│   │   └── SystemLog.php
│   ├── Services/
│   │   ├── TicketService.php
│   │   ├── UserService.php
│   │   ├── EmailService.php
│   │   ├── FileService.php
│   │   ├── NotificationService.php
│   │   ├── ActivityService.php
│   │   └── AnalyticsService.php
│   ├── Repositories/
│   │   ├── TicketRepository.php
│   │   ├── UserRepository.php
│   │   └── ActivityRepository.php
│   ├── Policies/
│   │   ├── TicketPolicy.php
│   │   ├── UserPolicy.php
│   │   └── AdminPolicy.php
│   ├── Livewire/
│   │   ├── TicketShow.php
│   │   ├── TicketList.php
│   │   ├── ReplyForm.php
│   │   ├── TypingIndicator.php
│   │   ├── NotificationBell.php
│   │   ├── UserStatusIndicator.php
│   │   └── Dashboard.php
│   ├── Mail/
│   │   ├── TicketCreated.php
│   │   ├── TicketReplyNotification.php
│   │   ├── TicketClosed.php
│   │   ├── VerifyEmail.php
│   │   └── ResetPassword.php
│   ├── Filament/
│   │   ├── Resources/
│   │   │   ├── UserResource.php
│   │   │   ├── TicketResource.php
│   │   │   ├── CategoryResource.php
│   │   │   └── ReportResource.php
│   │   ├── Pages/
│   │   │   ├── Dashboard.php
│   │   │   ├── Settings.php
│   │   │   └── ActivityLog.php
│   │   └── Widgets/
│   │       ├── StatsOverview.php
│   │       ├── TicketChart.php
│   │       └── UserChart.php
│   ├── Jobs/
│   │   ├── SendTicketNotification.php
│   │   ├── ProcessFileUpload.php
│   │   └── GenerateReport.php
│   ├── Events/
│   │   ├── TicketCreated.php
│   │   ├── TicketReplied.php
│   │   ├── UserBanned.php
│   │   └── ActivityLogged.php
│   ├── Listeners/
│   │   ├── SendTicketNotifications.php
│   │   ├── LogActivity.php
│   │   └── NotifyAdmins.php
│   └── Providers/
│       ├── AppServiceProvider.php
│       ├── AuthServiceProvider.php
│       ├── BroadcastServiceProvider.php
│       ├── EventServiceProvider.php
│       └── RouteServiceProvider.php
├── database/
│   ├── migrations/
│   │   ├── 2024_01_01_000000_create_users_table.php
│   │   ├── 2024_01_01_000001_create_tickets_table.php
│   │   ├── 2024_01_01_000002_create_ticket_replies_table.php
│   │   ├── 2024_01_01_000003_create_ticket_categories_table.php
│   │   ├── 2024_01_01_000004_create_ticket_tags_table.php
│   │   ├── 2024_01_01_000005_create_ticket_attachments_table.php
│   │   ├── 2024_01_01_000006_create_activity_logs_table.php
│   │   ├── 2024_01_01_000007_create_login_histories_table.php
│   │   ├── 2024_01_01_000008_create_banned_users_table.php
│   │   ├── 2024_01_01_000009_create_notifications_table.php
│   │   ├── 2024_01_01_000010_create_api_tokens_table.php
│   │   └── 2024_01_01_000011_create_system_logs_table.php
│   ├── seeders/
│   │   ├── DatabaseSeeder.php
│   │   ├── UserSeeder.php
│   │   ├── TicketSeeder.php
│   │   ├── CategorySeeder.php
│   │   ├── RolePermissionSeeder.php
│   │   └── AdminUserSeeder.php
│   └── factories/
│       ├── UserFactory.php
│       ├── TicketFactory.php
│       ├── TicketReplyFactory.php
│       └── ActivityLogFactory.php
├── resources/
│   ├── views/
│   │   ├── layouts/
│   │   │   ├── app.blade.php
│   │   │   ├── guest.blade.php
│   │   │   └── admin.blade.php
│   │   ├── components/
│   │   │   ├── navbar.blade.php
│   │   │   ├── sidebar.blade.php
│   │   │   ├── notification-toast.blade.php
│   │   │   ├── loading-skeleton.blade.php
│   │   │   ├── empty-state.blade.php
│   │   │   └── modal.blade.php
│   │   ├── auth/
│   │   │   ├── login.blade.php
│   │   │   ├── register.blade.php
│   │   │   ├── forgot-password.blade.php
│   │   │   ├── reset-password.blade.php
│   │   │   ├── verify-email.blade.php
│   │   │   └── two-factor-challenge.blade.php
│   │   ├── dashboard/
│   │   │   ├── index.blade.php
│   │   │   ├── stats.blade.php
│   │   │   └── charts.blade.php
│   │   ├── tickets/
│   │   │   ├── index.blade.php
│   │   │   ├── create.blade.php
│   │   │   ├── show.blade.php
│   │   │   ├── edit.blade.php
│   │   │   └── replies.blade.php
│   │   ├── profile/
│   │   │   ├── edit.blade.php
│   │   │   ├── show.blade.php
│   │   │   ├── avatar.blade.php
│   │   │   └── security.blade.php
│   │   ├── admin/
│   │   │   ├── dashboard.blade.php
│   │   │   ├── users.blade.php
│   │   │   ├── tickets.blade.php
│   │   │   ├── settings.blade.php
│   │   │   └── logs.blade.php
│   │   └── livewire/
│   │       ├── ticket-show.blade.php
│   │       ├── ticket-list.blade.php
│   │       ├── reply-form.blade.php
│   │       └── typing-indicator.blade.php
│   ├── css/
│   │   ├── app.css
│   │   ├── animations.css
│   │   └── components.css
│   └── js/
│       ├── app.js
│       ├── alpine-components.js
│       └── utils.js
├── routes/
│   ├── web.php
│   ├── api.php
│   ├── admin.php
│   └── auth.php
├── config/
│   ├── app.php
│   ├── database.php
│   ├── filesystems.php
│   ├── mail.php
│   ├── queue.php
│   ├── cache.php
│   ├── auth.php
│   └── filament.php
├── storage/
│   ├── app/
│   ├── logs/
│   └── framework/
├── public/
│   ├── index.php
│   ├── manifest.json (PWA)
│   └── service-worker.js
├── bootstrap/
├── tests/
│   ├── Feature/
│   ├── Unit/
│   └── TestCase.php
├── .env.example
├── .gitignore
├── artisan
├── composer.json
├── package.json
├── tailwind.config.js
├── vite.config.js
└── LICENSE
```

## 📱 Usage Examples

### Creating a Ticket

1. Login as a regular user
2. Click "New Ticket" button
3. Select category
4. Set priority level
5. Write ticket subject and description
6. Optionally attach files
7. Submit

### Responding to Tickets

1. Login as support staff
2. Navigate to admin panel or support dashboard
3. Find the ticket
4. Add public reply (visible to customer) or internal note (staff only)
5. Assign ticket to yourself or another agent
6. Update ticket status and priority
7. Close ticket when resolved

### Admin Panel Features

Access at `/admin` with admin credentials:

- View real-time statistics
- Manage users and permissions
- View all tickets and replies
- Configure SMTP settings
- Manage roles and permissions
- View system activity logs
- Generate custom reports
- Send announcements

## 🔌 API Endpoints

### Authentication Endpoints

```
POST   /api/v1/auth/login
POST   /api/v1/auth/logout
POST   /api/v1/auth/register
POST   /api/v1/auth/forgot-password
POST   /api/v1/auth/reset-password
POST   /api/v1/auth/verify-email
GET    /api/v1/auth/user
```

### Ticket Endpoints

```
GET    /api/v1/tickets                  # List all tickets
GET    /api/v1/tickets/{id}             # Get ticket details
GET    /api/v1/tickets/{id}/replies    # Get ticket replies
POST   /api/v1/tickets                  # Create ticket
PUT    /api/v1/tickets/{id}             # Update ticket
DELETE /api/v1/tickets/{id}             # Delete ticket
POST   /api/v1/tickets/{id}/replies    # Add reply
POST   /api/v1/tickets/{id}/close      # Close ticket
POST   /api/v1/tickets/{id}/reopen     # Reopen ticket
```

### User Endpoints

```
GET    /api/v1/users/{id}               # Get user profile
PUT    /api/v1/users/{id}               # Update profile
POST   /api/v1/users/{id}/avatar       # Upload avatar
GET    /api/v1/users/{id}/tickets      # Get user's tickets
GET    /api/v1/users/{id}/activity     # Get user activity
```

### Admin Endpoints

```
GET    /api/v1/admin/statistics         # System statistics
GET    /api/v1/admin/users              # List all users (admin)
GET    /api/v1/admin/tickets            # List all tickets (admin)
GET    /api/v1/admin/logs               # System logs (admin)
POST   /api/v1/admin/users/{id}/ban     # Ban user (admin)
POST   /api/v1/admin/users/{id}/unban   # Unban user (admin)
```

## 🔒 Security

- ✅ CSRF token protection on all forms
- ✅ XSS prevention with Blade escaping
- ✅ SQL injection prevention via Eloquent ORM
- ✅ Rate limiting on sensitive endpoints
- ✅ Secure password hashing with bcrypt
- ✅ Session timeouts and renewal
- ✅ IP logging for audit trails
- ✅ File upload validation (type, size, scanning)
- ✅ HTTPS enforcement in production
- ✅ CORS protection on API endpoints
- ✅ Security headers (X-Frame-Options, etc.)
- ✅ Permission-based access control
- ✅ Two-factor authentication support

## ⚡ Performance Optimization

- Database query optimization with eager loading
- Caching layer for frequently accessed data
- Pagination for large result sets
- Asset minification and bundling
- Database indexing on important columns
- Query result caching (5-60 minutes)
- View caching in production
- Configuration caching
- Route caching
- Lazy loading of relationships
- N+1 query prevention

## 🚀 Production Deployment

### Using Docker

```bash
docker-compose up -d
docker-compose exec app php artisan migrate --seed
```

### Using Supervisor for Queue Workers

Create `/etc/supervisor/conf.d/support-platform.conf`:

```ini
[program:support-platform-worker]
process_name=%(program_name)s_%(process_num)02d
command=php /path/to/artisan queue:work redis --sleep=3 --tries=3
autostart=true
autorestart=true
user=www-data
numprocs=4
redirect_stderr=true
stdout_logfile=/var/log/support-platform-worker.log
```

Reload supervisor:
```bash
supervisor reread
supervisor update
supervisor start support-platform-worker:*
```

### Using Nginx

```nginx
server {
    listen 443 ssl http2;
    server_name yourdomain.com;

    ssl_certificate /etc/letsencrypt/live/yourdomain.com/fullchain.pem;
    ssl_certificate_key /etc/letsencrypt/live/yourdomain.com/privkey.pem;

    root /path/to/public;
    index index.php;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.3-fpm.sock;
        fastcgi_index index.php;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.(?!well-known).* {
        deny all;
    }
}
```

### Environment Variables for Production

```env
APP_ENV=production
APP_DEBUG=false
CACHE_DRIVER=redis
SESSION_DRIVER=redis
QUEUE_CONNECTION=redis
MAIL_MAILER=smtp
MAIL_FROM_ADDRESS=noreply@yourdomain.com
```

## 🧪 Testing

Run tests:
```bash
php artisan test
```

Run tests with coverage:
```bash
php artisan test --coverage
```

## 📊 Database Maintenance

### Regular Backups

```bash
mysqldump -u root -p support_platform > backup_$(date +%Y%m%d_%H%M%S).sql
```

### Clear Old Logs

```bash
php artisan logs:clear
php artisan tinker
# ActivityLog::where('created_at', '<', now()->subMonths(3))->delete()
```

### Optimize Database

```bash
mysql -u root -p support_platform -e "OPTIMIZE TABLE tickets, ticket_replies, users;"
```

## 🔧 Troubleshooting

### Database Connection Error

```bash
# Check database is running
mysql -u root -p -e "SELECT 1;"

# Verify .env credentials
php artisan tinker
App\Models\User::count()  # Should return 0 if fresh
```

### Email Not Sending

```bash
# Check mail configuration
php artisan tinker
Mail::raw('Test email', function($message) {
    $message->to('test@example.com');
});

# Check queue is running
php artisan queue:work
```

### Assets Not Loading

```bash
# Rebuild assets
npm run build

# Clear vite cache
rm -rf bootstrap/cache/vite*
php artisan view:clear
```

### Permission Issues

```bash
chmod -R 755 storage
chmod -R 755 bootstrap/cache
chown -R www-data:www-data storage bootstrap
```

## 📚 Documentation

- [Laravel Documentation](https://laravel.com/docs/12.x)
- [Livewire Documentation](https://livewire.laravel.com)
- [FilamentPHP Documentation](https://filamentphp.com)
- [TailwindCSS Documentation](https://tailwindcss.com)
- [Alpine.js Documentation](https://alpinejs.dev)

## 🤝 Contributing

Contributions are welcome! Please follow these guidelines:

1. Fork the repository
2. Create a feature branch
3. Commit your changes
4. Push to the branch
5. Create a Pull Request

## 📝 License

MIT License - see LICENSE file for details

## 🙋 Support

For issues and feature requests, please:

1. Check existing issues
2. Create a new issue with detailed description
3. Include error messages and steps to reproduce

## 👨‍💻 Authors

Support Ticket Platform Team

## 🙏 Acknowledgments

Built with:
- Laravel framework
- Livewire for reactive components
- FilamentPHP for admin panel
- TailwindCSS for styling
- Alpine.js for interactivity

---

**Start your journey to excellent customer support today!**