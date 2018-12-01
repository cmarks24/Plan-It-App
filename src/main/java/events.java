public class events {
    boolean Public;
    int recurrenceRate,date,startTime,endTime,Date;

    public char getUsersGroups(){return 0;}

}

class homePage extends events{
    char events;
    public char getEventSet(){return events;}
}

class schedule extends events{
    char events;
    public char getEvents(){return events;}
    public char formatSchedule(){return events;}
}

class addEvents extends events{
    char events;
    public char loadEventToEdit(){return events;}
    public char pushEventToSchedule(){return 0;}
}
