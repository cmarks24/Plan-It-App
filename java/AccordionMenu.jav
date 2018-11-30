public class AccordionMenu {
boolean delete, invite;
char list;

    public boolean removeGroupFromList() {
        //delete member from group in database
        //delete group from users list
        //refresh page
        return delete;
    }

    public boolean sendGroupRequest(){
        //get username from user
        //add user to group list
        return invite;
    }

    public char showGroupMembers() {
        //fetch group members store in array
        //print to screen member list [comma format]
        return list;
    }
}

