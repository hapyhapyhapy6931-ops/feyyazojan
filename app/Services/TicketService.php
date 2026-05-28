<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Ticket;
use App\Models\TicketReply;
use App\Models\TicketAttachment;
use Illuminate\Support\Collection;
use Illuminate\Pagination\Paginator;

class TicketService
{
    public function createTicket(array $data): Ticket
    {
        return Ticket::create($data);
    }

    public function updateTicket(Ticket $ticket, array $data): bool
    {
        return $ticket->update($data);
    }

    public function deleteTicket(Ticket $ticket): bool
    {
        return $ticket->delete();
    }

    public function addReply(Ticket $ticket, array $data): TicketReply
    {
        $reply = $ticket->replies()->create($data);
        
        if (!$data['is_internal'] ?? false) {
            $ticket->update(['is_read' => false]);
        }

        return $reply;
    }

    public function updateReply(TicketReply $reply, array $data): bool
    {
        return $reply->update($data);
    }

    public function deleteReply(TicketReply $reply): bool
    {
        return $reply->delete();
    }

    public function closeTicket(Ticket $ticket, ?string $reason = null): bool
    {
        $ticket->close($reason);
        return true;
    }

    public function reopenTicket(Ticket $ticket): bool
    {
        $ticket->reopen();
        return true;
    }

    public function assignTicket(Ticket $ticket, int $userId): bool
    {
        return $ticket->update(['assigned_to' => $userId]);
    }

    public function unassignTicket(Ticket $ticket): bool
    {
        return $ticket->update(['assigned_to' => null]);
    }

    public function setTicketStatus(Ticket $ticket, string $status): bool
    {
        if (!in_array($status, ['open', 'answered', 'waiting', 'closed'])) {
            throw new \InvalidArgumentException("Invalid status: {$status}");
        }
        return $ticket->update(['status' => $status]);
    }

    public function setTicketPriority(Ticket $ticket, string $priority): bool
    {
        if (!in_array($priority, ['low', 'medium', 'high', 'critical'])) {
            throw new \InvalidArgumentException("Invalid priority: {$priority}");
        }
        return $ticket->update(['priority' => $priority]);
    }

    public function getTicketsByUser(int $userId, ?string $status = null, int $perPage = 15)
    {
        $query = Ticket::where('user_id', $userId);

        if ($status) {
            $query->where('status', $status);
        }

        return $query->latest()->paginate($perPage);
    }

    public function searchTickets(string $term, int $perPage = 15)
    {
        return Ticket::search($term)
                     ->latest()
                     ->paginate($perPage);
    }

    public function getUnreadCount(int $userId): int
    {
        return Ticket::where('user_id', $userId)
                     ->where('is_read', false)
                     ->count();
    }

    public function markTicketAsRead(Ticket $ticket): void
    {
        $ticket->markAsRead();
    }

    public function getTicketStatistics(): array
    {
        return [
            'total' => Ticket::count(),
            'open' => Ticket::where('status', 'open')->count(),
            'closed' => Ticket::where('status', 'closed')->count(),
            'high_priority' => Ticket::where('priority', 'high')->orWhere('priority', 'critical')->count(),
        ];
    }
}
