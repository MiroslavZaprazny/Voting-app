<x-modal-confirm 
    livewireEventToOpenModal="markAsSpamCommentWasSet"
    eventToCloseModal="commentWasMarkedAsSpam"
    modalTitle="Mark comment as Spam"
    modalDescription="Are your sure you want to mark this comment as spam? This action
    cannot be undone."
    modalConfirmBtnText="Mark as Spam"
    modalBackBtnText="Cancel"
    wireClick="markAsSpam"
/>