<?php

namespace Bulkly;

use Illuminate\Database\Eloquent\Model;

class BufferPosting extends Model
{
   public function groupInfo()
    {
        return $this->hasOne(SocialPostGroups::Class, 'id', 'group_id');
    }
   public function accountInfo()
    {
        return $this->hasOne(SocialAccounts::Class, 'id', 'account_id');
    }
    
    public function formatDateTime() {
    	$dateTime = date_create($this->sent_at);

    	return date_format($dateTime, 'g:ia \o\n l jS F Y');
    }

}
