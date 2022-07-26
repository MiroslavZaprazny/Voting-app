<x-modal-confirm 
    livewireEventToOpenModal="markAsNotSpamCommentWasSet"
    eventToCloseModal="commentWasMarkedAsNotSpam"
    modalTitle="Mark this comment as not spam"
    modalDescription="Are your sure you want to mark this idea as not spam? This action
    cannot be undone."
    modalConfirmBtnText="Yes"
    modalBackBtnText="Take me back"
    wireClick="markAsNotSpam"
/>